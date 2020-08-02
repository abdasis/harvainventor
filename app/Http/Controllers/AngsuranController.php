<?php

namespace App\Http\Controllers;

use App\Exports\AngsuranBulananExport;
use App\Exports\AngsuranExport;
use App\Http\Requests\AngsuranRequest;
use App\Models\Angsuran;
use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Excel;
use Illuminate\Support\Facades\Auth;

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
                $totalAngsuran = Angsuran::where('nasabah_id', $nasabah->id)->orderBy('created_at', 'desc')->count();

                $angsuran = new Angsuran();
                $angsuran->angsuran_ke = $totalAngsuran+1;
                $angsuran->tanggal_seharusnya = $request->get('tanggal_seharusnya');
                $angsuran->tanggal_pembayaran = $request->get('tanggal_pembayaran');
                $angsuran->pokok_dibayar = $request->get('pokok_dibayar');
                $angsuran->pokok_tunggakan = $request->get('pokok_tunggakan');
                $angsuran->jasa_dibayar = $request->get('jasa_dibayar');
                $angsuran->jasa_tunggakan = $request->get('jasa_tunggakan');
                $angsuran->sisa = $angsuranTerakhir == null ? ($nasabah->total_pinjaman+$nasabah->total_pinjaman * $nasabah->jasa_pinjaman / 100) - ($request->get('pokok_dibayar') + $request->get('jasa_dibayar')) : $angsuranTerakhir->sisa - ($request->get('pokok_dibayar') + $request->get('jasa_dibayar'));
                $angsuran->nasabah_id = $nasabah->id;
                $angsuran->nama_penyetor = Auth::user()->name;
                $angsuran->ttd_penyetor = "";
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
        $nasabah = Nasabah::where('nama', $request->nama_nasabah)->first();
        if ($request->get('pokok_dibayar') > $nasabah->total_pinjaman) {
            Session::flash('status', 'Pembayaran anda lebih besar dari pada total pinjaman');
            return redirect()->back()->withInput();

        }else{
            DB::transaction(function () use($request, $id) {
                $nasabah = Nasabah::where('nama', $request->nama_nasabah)->first();
                $angsuranTerakhir = Angsuran::where('nasabah_id', $nasabah->id)->orderBy('created_at', 'desc')->first();
                $angsuran = Angsuran::find($id);
                $angsuran->angsuran_ke = $angsuranTerakhir->angsuran_ke;
                $angsuran->tanggal_seharusnya = $request->get('tanggal_seharusnya');
                $angsuran->tanggal_pembayaran = $request->get('tanggal_pembayaran');
                $angsuran->pokok_dibayar = $request->get('pokok_dibayar');
                $angsuran->pokok_tunggakan = $request->get('pokok_tunggakan');
                $angsuran->jasa_dibayar = $request->get('jasa_dibayar');
                $angsuran->jasa_tunggakan = $request->get('jasa_tunggakan');
                $angsuran->sisa = ($angsuranTerakhir->sisa + $angsuranTerakhir->pokok_dibayar)  - $request->get('pokok_dibayar');
                $angsuran->nasabah_id = $nasabah->id;
                $angsuran->nama_penyetor = Auth::user()->name;
                $angsuran->ttd_penyetor = "";
                $angsuran->save();
            });
            Session::flash('status', 'Data angsuran berhasil dicatat');
            return redirect()->route('angsuran.create', $nasabah->id);
        }
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

    public function print($id)
    {
        $angsuran = Angsuran::find($id);
        $nasabah = Nasabah::find($angsuran->nasabah_id);
        return view('pages.angsuran.struk-angsuran')->withAngsuran($angsuran)->withNasabah($nasabah);
    }

    public function downloadRekap($id)
    {
        $nasabah = Nasabah::find($id);
        return (new AngsuranExport)->forNasbahId($id)->download( 'rekapan-nasabah-' . $nasabah->nama . '.xlsx');
    }

    public function rekapBulanan($id)
    {
        return (new AngsuranBulananExport)->thisMonth($id)->download('rekapan-bulan-' . date('F') . '.xlsx');
    }

}
