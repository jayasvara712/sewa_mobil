<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mobil;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->role =='admin'){
            return view('admin.index', [
                'title'         => 'Dashboard',
                'user'          => User::count(),
                'mobil'         => Mobil::count(),
                'peminjaman'    => Peminjaman::count(),
                'pengembalian'  => Pengembalian::count(),
            ]);
        }else{
            return view('user.index', [
                'title'         => 'Dashboard',
                'mobil'         => Mobil::all(),
            ]);
        }
    }

    public function home()
    {
        return view('user.index', [
            'title'         => 'Dashboard',
            'mobil'         => Mobil::all(),
        ]);
    }
}
