@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Nasabah</a></li>
                        <li class="breadcrumb-item active">Lihat</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $nasabah->nama }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Data Nasabah <b>{{ $nasabah->nama }}</b></div>
                <div class="card-body">
                    <table class="table table-borderless table-responsive">
                        <tbody>
                            <tr>
                                <th>Nomor</th>
                                <td>:</td>
                                <td>{{ $nasabah->nomor }}</td>
                            </tr>
                            <tr>
                                <th>Nama Nasabah</th>
                                <td>:</td>
                                <td>{{ $nasabah->nama }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>{{ $nasabah->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Total Pinjaman</th>
                                <td>:</td>
                                <td>{{ $nasabah->total_pinjaman }}</td>
                            </tr>
                            <tr>
                                <th>Jasa Pinjaman</th>
                                <td>:</td>
                                <td>{{ $nasabah->jasa_pinjaman }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pencarian</th>
                                <td>:</td>
                                <td>{{ $nasabah->tanggal_pencarian }}</td>
                            </tr>
                            <tr>
                                <th>Jangka Pinjaman</th>
                                <td>:</td>
                                <td>{{ $nasabah->jangka_pinjaman }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Angsuran</th>
                                <td>:</td>
                                <td>{{ $nasabah->jumlah_angsuran }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
