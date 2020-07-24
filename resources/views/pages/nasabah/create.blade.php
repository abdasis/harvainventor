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
                    Tambah Data Nasabah
                </div>
                <div class="card-body">
                    <form action="{{ route('nasabah.store') }}" method="post">

                        @csrf
                        <div class="form-group">
                            <label for="nama_kelompok">Nomor Kelompok</label>
                            <input type="text" class="form-control bg-gray" name="nomor" placeholder="Masukan Nomor kelompok">
                        </div>

                        <div class="form-group">
                            <label for="nama_kelompok">Nama Kelompok</label>
                            <input type="text" class="form-control" name="nama_kelompok" value="{{ old('nama_kelompok') }}" placeholder="Masukan nama kelompok">
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat Kelompok</label>
                            <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10" placeholder="Masukan alamat kelompok">{{ old('alamat_kelompok') }}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="total_pinjaman">Total Pinjaman</label>
                                    <input type="text" id="total_pinjaman" class="form-control" placeholder="Masukan total pinjaman" name="total_pinjaman" value="{{ old('total_pinjaman') }}">
                                    <p class="font-16 font-weight-bold" id="total_pinjaman_rupiah"></p>
                                </div>

                                <div class="col-md-3">
                                    <label for="jasa_pinjaman">Jasa Pinjaman</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="jasa_pinjaman" placeholder="Masukan nominal jasa pinjaman" name="jasa_pinjaman" value="{{ old('jasa_pinjaman') }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">%</div>
                                        </div>
                                    </div>
                                    <p class="font-16 font-weight-bold" id="jasa_pinjaman_rupiah"></p>
                                </div>
                                <div class="col-md-3">
                                    <label for="total_pinjaman">Total Jasa</label>
                                    <input type="text" readonly id="total_jasa" class="form-control" placeholder="Masukan total pinjaman" name="total_pinjaman" value="{{ old('total_pinjaman') }}">
                                    <p class="font-16 font-weight-bold" id="total_jasa_rupiah"></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="tanggal_pencarian">Pencairan</label>
                                    <input class="form-control" id="pencarian" type="date" name="pencairan">
                                </div>
                                <div class="col-md-3">
                                    <label for="jangka_waktu_pinjaman">Jangka Waktu Pinjaman</label>
                                    <input type="text" id="jangka_watku_pinjaman" name="jangka_waktu_pinjaman" placeholder="Masukan jumlah bulan " value="{{ old('jangka_waktu_pinjaman') }}" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="jumlah_angsura">Jumlah Angsuran</label>
                                    <input type="text" class="form-control" name="jumlah_angsuran" placeholder="Masukan jumlah angsuran" value="{{ old('jumlah_angsuran') }}">
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


@section('js')
    <script>
        $(document).ready(function(){

            $('#jasa_pinjaman').keyup(function(event){
                let total_pinjaman = $('#total_pinjaman').val();
                let jasa_pinjaman = $('#jasa_pinjaman').val();
                if ($('#total_pinjaman').val() == "") {
                    $('#total_jasa').val(0);
                }else{
                    $('#total_jasa').val(total_pinjaman * jasa_pinjaman / 100);
                }
            })

            $('#total_pinjaman').keyup(function(){
                $('#total_pinjaman_rupiah').text(formatRupiah($('#total_pinjaman').val(), 'Rp.'))
            })

            $('#jasa_pinjaman').keyup(function(){
                $('#total_jasa_rupiah').text(formatRupiah($('#total_jasa').val(), 'Rp.'))
            })


        })

        function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
    </script>
@endsection
