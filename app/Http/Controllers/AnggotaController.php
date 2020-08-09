<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
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
    public function create($id)
    {
        $nasabah = Nasabah::find($id);
        $anggota = Anggota::where('nasabah_id', $nasabah->id)->get();
        return view('pages.anggota.create')->withNasabah($nasabah)->withAnggotas($anggota);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $anggota = new Anggota();
        $anggota->nama = $request->get('nama');
        $anggota->jabatan = $request->get('jabatan');
        $anggota->alamat = $request->get('alamat');
        $anggota->rt = $request->get('rt');
        $anggota->rw = $request->get('rw');
        $anggota->jenis_usaha = $request->get('jenis_usaha');
        $anggota->total_pinjaman = $request->get('total_pinjaman');
        $anggota->ahli_waris = $request->get('waris');
        $anggota->nasabah_id = $request->get('id');
        $anggota->save();
        if ($anggota) {
            Session::flash('status', 'Data anggota berhasil di tambahkan');
            Alert::success('Berhasil', 'Data berhasil di tambahkan');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::find($id);
        return view('pages.anggota.edit')->withAnggota($anggota);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $anggota = Anggota::find($id);
        $anggota->nama = $request->get('nama');
        $anggota->jabatan = $request->get('jabatan');
        $anggota->alamat = $request->get('alamat');
        $anggota->rt = $request->get('rt');
        $anggota->rw = $request->get('rw');
        $anggota->jenis_usaha = $request->get('jenis_usaha');
        $anggota->total_pinjaman = $request->get('total_pinjaman');
        $anggota->ahli_waris = $request->get('waris');
        $anggota->nasabah_id = $anggota->nasabah_id;
        $anggota->save();
        if ($anggota) {
            Session::flash('status', 'Data anggota berhasil di tambahkan');
            Alert::success('Berhasil', 'Data berhasil di tambahkan');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $anggota)
    {
        //
    }

    public function pernyataan($id)
    {
        $anggota = Anggota::find($id);
        return view('pages.pernyataan.show')->withPernyataan($anggota);
    }

    public function perjanjianKredit($id)
    {
        $nasabah = Nasabah::find($id);
        return view('pages.pernyataan.perjanjian_kredit')->withNasabah($nasabah);
    }

    public function kuasa($id)
    {
        $nasabah = Nasabah::find($id);
        return view('pages.pernyataan.surat_kuasa')->withPernyataan($nasabah);

    }

    public function pencairan ($id)
    {
        $nasabah = Nasabah::find($id);
        return view('pages.pernyataan.berita_acara')->withPernyataan($nasabah);
    }

    public function tandaTerima ($id)
    {
        $nasabah = Nasabah::find($id);
        return view('pages.pernyataan.tanda_terima')->withPernyataan($nasabah);
    }

    public function kuitansiMetrai ($id)
    {
        $nasabah = Nasabah::find($id);
        return view('pages.pernyataan.kuitansi_materai')->withPernyataan($nasabah);
    }

    public function kuitansiNonMetrai($id)
    {
        $nasabah = Nasabah::find($id);
        return view('pages.pernyataan.kuitansi_non_materai')->withPernyataan($nasabah);
    }
}
