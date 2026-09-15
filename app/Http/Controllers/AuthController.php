<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Memproses submit form register (validasi SISI SERVER, wajib meski sudah divalidasi di client)
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'min:3', 'max:100'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'nim_nip' => ['required', 'min_digits:14', 'unique:users,nim_nip'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'nim_nip'  => $validated['nim_nip'],
            'password' => Hash::make($validated['password']),
            'role'     => 'pengguna', // default role sesuai hint database
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silakan login.');
    }

    // Memproses submit form login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()
            ->withErrors(['email' => 'Email atau password salah.'])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}