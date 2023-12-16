<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $cerdentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($cerdentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Login Berhasil, Selamat Datang!');
        }
        return back()->with('errors', 'Login Gagal, Email atau Password Salah!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/')->with('success', 'Berhasil Logout!');
    }
}
