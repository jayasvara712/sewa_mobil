<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Mobil;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
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
            return view('admin.peminjaman.index', [
                'title' => 'peminjaman',
                'peminjaman' => Peminjaman::with('user', 'mobil')->get()->sortBy('tgl_mulai_peminjaman')
            ]);
        }else{
            return view('user.peminjaman.index', [
                'title' => 'peminjaman',
                'peminjaman' => Peminjaman::with('user', 'mobil')->where('id_user',$user->id_user)->get()->sortBy('tgl_mulai_peminjaman')
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mobil = Mobil::findOrFail($request->id_mobil);
        $validateData = $request->validate([
            'id_user'   => 'required|max:255',
            'id_mobil'   => 'required|max:255',
            'tgl_mulai_peminjaman' => 'required|max:255',
            'tgl_selesai_peminjaman'   => 'required|max:255',
        ]);

        Peminjaman::create($validateData);
        Mobil::where('id_mobil', $mobil->id_mobil)
            ->update(['status_mobil'=>'Tidak Tersedia']);

        return redirect('/user/peminjaman')->with('success', 'Berhasil Meminjam Mobil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
