<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Rencana;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;

class RencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nasabah)
    {
        $rencana = Rencana::all();
        $nasabah = Nasabah::find($nasabah);
        return view('pages.rencana.create')->withNasabah($nasabah)->withRencanas($rencana);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use($request) {
            $nasabah = Nasabah::find($request->id);
            $angsuranTerakhir = Rencana::where('nasabah_id', $nasabah->id)->orderBy('created_at', 'desc')->first();
            $rencana = new Rencana();
            $rencana->tanggal_seharusnya = $request->rencana;
            $rencana->tanggal_pembayaran = '';
            $rencana->pinjaman_pokok = $request->get('total');
            $rencana->jasa_pinjaman = $request->get('total') * $nasabah->jasa_pinjaman /100;
            $rencana->sisa_pokok = $angsuranTerakhir == null ? $nasabah->total_pinjaman - $request->get('total') : $angsuranTerakhir->sisa_pokok - $request->get('total');
            $rencana->sisa_jasa = $angsuranTerakhir == null ? $nasabah->besar_jasa - $request->get('total') * $nasabah->jasa_pinjaman / 100 : $angsuranTerakhir->sisa_jasa - $request->get('total') * $nasabah->jasa_pinjaman / 100;
            $rencana->total = $rencana->sisa_pokok + $rencana->sisa_jasa;
            $rencana->nasabah_id = $nasabah->id;
            $rencana->save();
        });

        FacadesSession::flash('status', 'Data berhasil ditambahkan');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rencana  $rencana
     * @return \Illuminate\Http\Response
     */
    public function show(Rencana $rencana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rencana  $rencana
     * @return \Illuminate\Http\Response
     */
    public function edit(Rencana $rencana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rencana  $rencana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rencana $rencana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rencana  $rencana
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rencana $rencana)
    {
        //
    }
}
