<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function register()
    {
        return view('register', [
            'title' => 'Register',
            'active' => 'Register'
        ]);
    }

    public function registerProcess(Request $request)
    {
        $validateData = $request->validate([
            'email'   => 'required|max:255',
            'username'   => 'required|max:255',
            'password' => 'required|max:255',
            'nama'   => 'required|max:255',
            'alamat'   => 'required|max:255',
            'no_telp'   => 'required|max:255',
            'no_sim'   => 'required|max:255',
            'role'   => 'required|max:255',
        ]);

        User::create($validateData);

        return redirect('/')->with('success', 'Berhasil Mendaftar!');
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
