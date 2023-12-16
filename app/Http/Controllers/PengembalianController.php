<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Mobil;
use Illuminate\Http\Request;
use DateTime;

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
        return view('user.pengembalian.create', [
            'title' => 'mobil',
        ]);
    }

    public function calculate(Request $request){
        $mobil = Mobil::where('no_plat_mobil', $request->no_plat_mobil)->first();
        if ($mobil != null) {
            $peminjaman = Peminjaman::where('id_mobil',$mobil->id_mobil)->first();

            // count days
            $fdate = $peminjaman->tgl_mulai_peminjaman;
            $tdate = $peminjaman->tgl_selesai_peminjaman;
            $datetime1 = new DateTime($fdate);
            $datetime2 = new DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');

            $lama_sewa = $days;

            $total_bayar = $lama_sewa * $mobil->tarif_mobil;

            $id_user = auth()->user()->id_user;
            return view('user.pengembalian.calculate', [
                'title' => 'pengembalian',
                'peminjaman' => $peminjaman,
                'mobil' => $mobil,
                'lama_sewa' => $lama_sewa,
                'total_bayar' => $total_bayar,
                'tgl_pengembalian' => $request->tgl_pengembalian,
                'id_user'   => $id_user,
            ]);
        }else{
            return back()->with('errors', 'No Plat Mobil tidak ditemukan!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_user'   => 'required|max:255',
            'id_mobil'   => 'required|max:255',
            'tgl_pengembalian' => 'required|max:255',
            'total_bayar'   => 'required|max:255',
        ]);

        Pengembalian::create($validateData);

        return redirect('/user/pengembalian')->with('success', 'Mobil Berhasil dikembalikan!');
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
        $mobil = Mobil::findOrFail($peminjaman->id_mobil);
        return view('user.pengembalian.edit', [
            'title' => 'pengembalian',
            'peminjaman' => $peminjaman,
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
