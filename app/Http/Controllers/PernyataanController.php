<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Pernyataan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class PernyataanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('pernyataan.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pernyataans = Pernyataan::all();
        $nasabah = Nasabah::all();
        return view('pages.pernyataan.create')->withPernyataans($pernyataans)->withNasabahs($nasabah);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pernyataan = new Pernyataan();
        $pernyataan->name = $request->get('nama');
        $pernyataan->jabatan =  $request->get('jabatan');
        $pernyataan->kelompok  = $request->get('kelompok');
        $pernyataan->alamat = $request->get('alamat');
        $pernyataan->desa = $request->get('desa');
        $pernyataan->save();
        if ($pernyataan) {
            Session::flash('status', 'Data berhasil disimpan');
            Alert::success('Berhasil', 'Data berhasil disimpan');
        }

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pernyataan  $pernyataan
     * @return \Illuminate\Http\Response
     */
    public function show(Pernyataan $pernyataan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pernyataan  $pernyataan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pernyataan $pernyataan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pernyataan  $pernyataan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $pernyataan = Pernyataan::find($id);
        $pernyataan->name = $request->get('nama');
        $pernyataan->jabatan =  $request->get('jabatan');
        $pernyataan->kelompok  = $request->get('kelompok');
        $pernyataan->alamat = $request->get('alamat');
        $pernyataan->desa = $request->get('desa');
        $pernyataan->save();
        if ($pernyataan) {
            Session::flash('status', 'Data berhasil disimpan');
            Alert::success('Berhasil', 'Data berhasil disimpan');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pernyataan  $pernyataan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pernyataan $pernyataan)
    {
        //
    }
}
