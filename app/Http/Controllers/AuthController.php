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
            'email'   => 'required|unique:users|max:255',
            'username'   => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'nama'   => 'required|max:255',
            'alamat'   => 'required|max:255',
            'no_telp'   => 'required|max:255',
            'no_sim'   => 'required|unique:users|max:255',
            'role'   => 'required|max:255',
        ]);

        $user = User::create($validateData);
        $lastId = $user->id_user;
        $password = bcrypt($request->password);

        User::where('id_user', $user->id_user)
            ->update(['password'=>$password]);

        return redirect('/login')->with('success', 'Berhasil Mendaftar!');
    }

    public function authenticate(Request $request)
    {
        $cerdentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($cerdentials)) {
            $request->session()->regenerate();
            if(auth()->user()->role == 'admin'){
                return redirect()->intended('/')->with('success', 'Login Berhasil, Selamat Datang!');
            }else if(auth()->user()->role == 'user'){
                return redirect()->intended('/user')->with('success', 'Login Berhasil, Selamat Datang!');
            }
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
