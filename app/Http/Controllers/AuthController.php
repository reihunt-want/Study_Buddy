<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login'); // login.blade.php
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        // cari user berdasarkan username/email + role
        $user = User::where(function ($q) use ($request) {
                        $q->where('email', $request->username)
                          ->orWhere('nama', $request->username);
                    })
                    ->where('role', $request->role)
                    ->first();

        if ($user && Hash::check($request->password, $user->password)) {
    // login dengan Laravel guard
    Auth::login($user);

    return match ($user->role) {
        'siswa' => redirect()->route('students.dashboard'),
        'tutor' => redirect()->route('tutor.dashboard'),
        'admin' => redirect()->route('admin.dashboard'),
        default => redirect()->route('login.form')->with('error', 'Role tidak dikenali'),
    };
}



        return back()->with('error', 'Username/Password/Role salah');
    }
}
