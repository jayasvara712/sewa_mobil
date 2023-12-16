<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Mobil;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->role=='admin') {
            return view('admin.pengembalian.index', [
                'title' => 'pengembalian',
                'pengembalian' => Pengembalian::with('user', 'mobil')->get()->sortBy('tgl_pengembalian')
            ]);
        }else{
            return view('user.pengembalian.index', [
                'title' => 'pengembalian',
                'pengembalian' => Pengembalian::with('user', 'mobil')->where('id_user',$user->id_user )->get()->sortBy('tgl_pengembalian')
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peminjaman = Mobil::findOrFail($id);
        return view('user.pengembalian.edit', [
            'title' => 'pengembalian',
            'pengembalian' => $pengembalian
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $mobil = Mobil::findOrFail($id);
        return view('user.pengembalian.edit', [
            'title' => 'pengembalian',
            'pengembalian' => $pengembalian,
            'mobil' => $mobil,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengembalian $pengembalian)
    {
        //
    }
}
