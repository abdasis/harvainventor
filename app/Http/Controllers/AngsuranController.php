<?php

namespace App\Http\Controllers;

use App\Http\Requests\AngsuranRequest;
use App\Models\Angsuran;
use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AngsuranController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $nasabah = Nasabah::find($id);
        $angsuran = Angsuran::where('nasabah_id', $id)->get();
        $sisaAngsuran = Angsuran::where('nasabah_id', $id)->orderBy('created_at', 'desc')->value('sisa');
        return view('pages.angsuran.create')->withNasabah($nasabah)->withAngsurans($angsuran)->withSisaAngsuran($sisaAngsuran);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AngsuranRequest $request)
    {
        $nasabah = Nasabah::where('nama', $request->nama_nasabah)->first();
        $angsuran = Angsuran::where('nasabah_id', $nasabah->id)->get();
        if ($request->get('pokok_dibayar') > $nasabah->total_pinjaman) {
            Session::flash('status', 'Pembayaran anda lebih besar dari pada total pinjaman');
            return redirect()->back()->withInput();

        }else{
            DB::transaction(function () use($request) {
                $nasabah = Nasabah::where('nama', $request->nama_nasabah)->first();
                $angsuranTerakhir = Angsuran::where('nasabah_id', $nasabah->id)->orderBy('created_at', 'desc')->first();
                $angsuran = new Angsuran();
                $angsuran->angsuran_ke = $angsuranTerakhir == null ? 1 : $angsuranTerakhir->id;
                $angsuran->tanggal_seharusnya = $request->get('tanggal_seharusnya');
                $angsuran->tanggal_pembayaran = $request->get('tanggal_pembayaran');
                $angsuran->pokok_dibayar = $request->get('pokok_dibayar');
                $angsuran->pokok_tunggakan = $request->get('pokok_tunggakan');
                $angsuran->jasa_dibayar = $request->get('jasa_dibayar');
                $angsuran->jasa_tunggakan = $request->get('jasa_tunggakan');
                $angsuran->sisa = $nasabah->total_pinjaman  - $request->get('pokok_dibayar');
                $angsuran->nasabah_id = $nasabah->id;
                $angsuran->nama_penyetor = "Abd. Asis";
                $angsuran->ttd_penyetor = "Selamat";
                $angsuran->save();
            });
            Session::flash('status', 'Data angsuran berhasil dicatat');
            return redirect()->back()->withNasabah($nasabah)->withAngsurans($angsuran);


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $angsuran = Angsuran::find($id);
        $nasabah = Nasabah::where('id', $angsuran->nasabah_id)->first();
        return view('pages.angsuran.edit')->withNasabah($nasabah)->withAngsuran($angsuran);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $angsuran = Angsuran::find($id);
        $angsuran->delete();
        return response()->json("Data angsuran berhasil dihapus", 200);
    }
}
