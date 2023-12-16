<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.mobil.index', [
            'title' => 'mobil',
            'mobil' => Mobil::all()->sortBy('merek_mobil')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mobil.create', [
            'title' => 'mobil',
        ]);
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
            'merek_mobil'   => 'required|max:255',
            'model_mobil'   => 'required|max:255',
            'no_plat_mobil' => 'required|max:255',
            'tarif_mobil'   => 'required|max:255',
            'status_mobil'   => 'required|max:255',
        ]);

        Mobil::create($validateData);

        return redirect('/admin/mobil')->with('success', 'Data Mobil Berhasil Di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('admin.mobil.edit', [
            'title' => 'mobil',
            'mobil' => $mobil
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mobil = Mobil::findOrFail($id);
        $validateData = $request->validate([
            'merek_mobil'   => 'required|max:255',
            'model_mobil'   => 'required|max:255',
            'no_plat_mobil' => 'required|max:255',
            'tarif_mobil'   => 'required|max:255',
            'status_mobil'   => 'required|max:255',
        ]);

        Mobil::where('id_mobil', $mobil->id_mobil)
            ->update($validateData);

        return redirect('/admin/mobil')->with('success', 'Data Mobil Berhasil Di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res_code = 500; //500 for internal error
        $err_msg = "";
        $result_msg = "";
        try {
            $mobil = Mobil::findOrFail($id);
            Mobil::destroy($mobil->id_mobil);

            $result_msg = "Data Mobil Berhasil Di Hapus!";
            $res_code = 200; //return 200 for OK
        } catch (\Exception $e) {
            $res_code = 500;
            $err_msg = $e->getMessage();
        }

        return response()->json(['result' => $result_msg, 'response_code' => $res_code, 'error_message' => $err_msg]);
    }
}
