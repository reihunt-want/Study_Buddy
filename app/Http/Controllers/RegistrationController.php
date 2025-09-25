<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'no_whatsapp' => 'required|string',
            'tanggal_lahir' => 'nullable|date',
            'password' => 'required|string|min:6',
        ]);

        // generate ID otomatis berdasarkan role
        $role = 'siswa'; // default siswa
        $prefix = strtoupper(substr($role, 0, 1)); // "s" jadi "S"
        $lastUser = User::where('role', $role)->orderBy('user_id', 'desc')->first();
        $lastNumber = $lastUser ? (int)substr($lastUser->user_id, 1) : 0;
        $newId = $prefix . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        User::create([
            'user_id' => $newId,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'no_whatsapp' => $request->no_whatsapp,
            'tanggal_lahir' => $request->tanggal_lahir,
            'password' => Hash::make($request->password),
            'role' => $role,
        ]);

        return redirect()->route('home')->with('success', 'Pendaftaran berhasil!');
    }
}
