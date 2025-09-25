<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'email'         => 'required|email|unique:users,email',
            'no_whatsapp'   => 'required|string|max:20',
            'tanggal_lahir' => 'nullable|date',
            'password'      => 'required|min:6',
        ]);

        // Simpan ke tabel users
        $user = User::create([
            'nama'          => $validated['nama'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'email'         => $validated['email'],
            'no_whatsapp'   => $validated['no_whatsapp'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'password'      => Hash::make($validated['password']),
            'role'          => 'siswa', // default role siswa
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}
