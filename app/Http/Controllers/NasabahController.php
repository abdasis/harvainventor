<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $nasabahs = Nasabah::all();
        return view('pages.nasabah.index')->withNasabahs($nasabahs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.nasabah.create');
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
            $nasabah = new Nasabah();
            $nasabah->nomor = $request->get('nomor');
            $nasabah->nama = $request->get('nama_kelompok');
            $nasabah->alamat = $request->get('alamat');
            $nasabah->total_pinjaman = $request->get('total_pinjaman');
            $nasabah->jasa_pinjaman = $request->get('jasa_pinjaman');
            $nasabah->tanggal_pencarian = $request->get('pencairan');
            $nasabah->jenis_pinjaman = $request->get('jenis_pinjaman');
            $nasabah->jangka_pinjaman = $request->get('jangka_waktu_pinjaman');
            $nasabah->jumlah_angsuran   = $request->get('jumlah_angsuran');
            $nasabah->besar_pokok = $request->get('total_pinjaman');
            $nasabah->besar_jasa = $request->get('total_pinjaman') * $request->get('jasa_pinjaman') / 100;
            $nasabah->save();
            Session::flash('status', 'Data nasabah berhasil di tambahkan');
        });
        return redirect()->route('nasabah.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nasabah = Nasabah::find($id);
        return view('pages.nasabah.show')->withNasabah($nasabah);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nasabah = Nasabah::find($id);
        return view('pages.nasabah.edit')->withNasabah($nasabah);
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
        DB::transaction(function () use($request, $id) {
            $nasabah = Nasabah::find($id);
            $nasabah->nomor = $request->get('nomor');
            $nasabah->nama = $request->get('nama_kelompok');
            $nasabah->alamat = $request->get('alamat');
            $nasabah->total_pinjaman = $request->get('total_pinjaman');
            $nasabah->jasa_pinjaman = $request->get('jasa_pinjaman');
            $nasabah->tanggal_pencarian = $request->get('pencairan');
            $nasabah->jenis_pinjaman = $request->get('jenis_pinjaman');
            $nasabah->jangka_pinjaman = $request->get('jangka_waktu_pinjaman');
            $nasabah->jumlah_angsuran   = $request->get('jumlah_angsuran');
            $nasabah->besar_pokok = $request->get('total_pinjaman');
            $nasabah->besar_jasa = $request->get('total_pinjaman') * $request->get('jasa_pinjaman') / 100;
            $nasabah->save();
        });
        Session::flash('status', 'Data nasabah berhasil di update');
        return redirect()->route('nasabah.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nasabah = Nasabah::find($id);
        $nasabah->delete();
        if ($nasabah) {
            Session::flash('status', 'Data Berhasil di delete');
            return redirect()->back();
        }
    }

    public function dashboard(Request $request)
    {
        if ($request->get('filter_tanggal')) {
            $tanggalAwal = substr($request->get('filter_tanggal'), 0, 10);
            $tanggalAkhir = substr($request->get('filter_tanggal'), 14);
            $angsurans = Angsuran::whereBetween('created_at', [$tanggalAwal, $tanggalAkhir])->get();
            $nasabahs = Nasabah::all();
            $totalBayar = Angsuran::whereMonth('created_at', date('m'))->sum('pokok_dibayar');
            $nasabahBelumBayar = Angsuran::has('nasabah')->whereMonth('created_at', date('m'))->get();
            Session::flash('filter', $request->get('filter_tanggal'));

        }else{
            $nasabahs = Nasabah::all();
            $angsurans = Angsuran::all();
            $totalBayar = Angsuran::whereMonth('created_at', date('m'))->sum('pokok_dibayar');
            $totalJasa = Angsuran::whereMonth('created_at', date('m'))->sum('jasa_dibayar');
            $nasabahBelumBayar = Angsuran::has('nasabah')->whereMonth('created_at', date('m'))->get();
            Session::forget('filter');
        }

        // dd($nasabahBelumBayar);

        return view('home')->with([
            'nasabahs' => $nasabahs,
            'angsurans' => $angsurans,
            'nasabahBelumBayar' => $nasabahBelumBayar,
            'totalAngsuran' => $totalBayar + $totalJasa
        ]);
    }
}
