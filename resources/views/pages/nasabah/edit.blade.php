@extends('layouts.app')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control border-0" id="dash-daterange">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-blue border-blue text-white">
                                        <i class="mdi mdi-calendar-range"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-1">
                            <i class="mdi mdi-filter-variant"></i>
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    @include('components.alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Data
                </div>
                <div class="card-body">
                    <form action="{{ route('nasabah.update', $nasabah->id) }}" method="post">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_kelompok">Nomor Kelompok</label>
                            <input type="text" class="form-control bg-gray" readonly name="nomor" value="{{ $nasabah->nomor }}" placeholder="Masukan Nomor kelompok">
                        </div>


                        <div class="form-group">
                            <label for="nama_kelompok">Nama Kelompok</label>
                            <input type="text" class="form-control" name="nama_kelompok" value="{{ $nasabah->nama }}" placeholder="Masukan nama kelompok">
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="nama_kelompok">Tahun Berdiri</label>
                                    <input type="text" class="form-control bg-gray" name="berdiri" value="{{ $nasabah->berdiri }}" placeholder="{{ date('Y') }}">
                                </div>
                                <div class="col-md-5">
                                    <label for="nama_kelompok">Kepala Desa</label>
                                    <input type="text" class="form-control bg-gray" value="{{ $nasabah->kepala_desa }}" name="kepala_desa" placeholder="Masukan Nama Kepala Desa">
                                </div>
                                <div class="col-md-5">
                                    <label for="nama_kelompok">Desa</label>
                                    <input type="text" class="form-control bg-gray" value="{{ $nasabah->desa }}" name="desa" placeholder="Masukan Nama Desa">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="alamat">Alamat Kelompok</label>
                            <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10" placeholder="Masukan alamat kelompok">{{ $nasabah->alamat }}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="nama_kelompok">Ketua</label>
                                    <input type="text" class="form-control bg-gray" name="ketua" value="{{ $nasabah->ketua }}" placeholder="Masukan Nama Ketua">
                                </div>
                                <div class="col-md-4">
                                    <label for="nama_kelompok">Sekretaris</label>
                                    <input type="text" class="form-control bg-gray" name="sekretaris" value="{{ $nasabah->sekretaris }}" placeholder="Masukan Nama Sekretaris">
                                </div>
                                <div class="col-md-4">
                                    <label for="nama_kelompok">Bendahara</label>
                                    <input type="text" class="form-control bg-gray" name="bendahara" value="{{ $nasabah->bendahara }}" placeholder="Masukan Nama Bendahara">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="total_pinjaman">Total Pinjaman</label>
                                    <input type="text" class="form-control" placeholder="Masukan total pinjaman" name="total_pinjaman" value="{{ $nasabah->total_pinjaman }}">
                                </div>

                                <div class="col-md-4">
                                    <label for="jasa_pinjaman">Jasa Pinjaman</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Masukan nominal jasa pinjaman" name="jasa_pinjaman" value="{{ $nasabah->jasa_pinjaman }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="total_pinjaman">Total Pinjaman</label>
                                    <input type="text" class="form-control" placeholder="Masukan total pinjaman" name="total_pinjaman" value="{{ $nasabah->total_pinjaman }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="tanggal_pencarian">Pencairan</label>
                                    <input class="form-control" id="pencarian" value="{{ $nasabah->tanggal_pencarian }}" type="date" name="pencairan">
                                </div>

                                <div class="col-md-3">
                                    <label for="jenis_pinjaman">Jenis Pinjaman</label>
                                    <select id="jenis_pinjaman" class="custom-select" name="jenis_pinjaman">
                                        <option value="SPP" {{ $nasabah->jenis_pinjaman == 'SPP' ? 'selected' : '' }}>SPP</option>
                                        <option value="UEP" {{ $nasabah->jenis_pinjaman == 'UEP' ? 'selected' : '' }}>UEP</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="jangka_waktu_pinjaman">Jangka Waktu Pinjaman</label>
                                    <input type="text" id="jangka_watku_pinjaman" name="jangka_waktu_pinjaman" placeholder="Masukan jumlah bulan " value="{{ $nasabah->jangka_pinjaman }}" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="jumlah_angsura">Jumlah Angsuran</label>
                                    <input type="text" class="form-control" name="jumlah_angsuran" placeholder="Masukan jumlah angsuran" value="{{ $nasabah->jumlah_angsuran }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary waves-effect" type="submit"><i class="fa fa-save mr-1"></i>Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
