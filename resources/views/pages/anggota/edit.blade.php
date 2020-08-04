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
                <h4 class="page-title">Edit Anggota: <span class="text-danger">{{ $anggota->nama }}</span></h4>
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
                    <form action="{{ route('anggota.update', $anggota->id) }}" method="post">

                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_kelompok">Nama</label>
                            <input type="text" class="form-control bg-gray" name="nama" value="{{ $anggota->nama }}" placeholder="Masukan nama anggota">
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="5" placeholder="Masukan alamat anggota">{{ $anggota->alamat }}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="total_pinjaman">RT</label>
                                    <input type="text" class="form-control" value="{{ $anggota->rt }}" placeholder="RT" name="rt">
                                </div>

                                <div class="col-md-3">
                                    <label for="jasa_pinjaman">RW</label>
                                    <input type="text" class="form-control" placeholder="RW" value="{{ $anggota->rw }}" name="rw">
                                </div>
                                <div class="col-md-6">
                                    <label for="total_pinjaman">Jenis Usaha</label>
                                    <input type="text"  class="form-control"  placeholder="Masukan jenis usaha" name="jenis_usaha" value="{{ $anggota->jenis_usaha }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="total_pinjaman">Total Pinjaman</label>
                                    <input type="text" id="total_pinjaman" class="form-control" placeholder="Masukan total pinjaman" name="total_pinjaman" value="{{ $anggota->total_pinjaman }}">
                                    <p class="font-16 font-weight-bold" id="total_pinjaman_rupiah"></p>
                                </div>
                                <div class="col-md-6">
                                    <label for="ahli_waris">Ahli Waris</label>
                                    <input type="text" class="form-control" placeholder="Ahli waris" name="waris" value="{{ $anggota->ahli_waris }}">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <button class="btn btn-blue waves-effect" type="submit"><i class="fa fa-save mr-1"></i>Simpan Data</button>
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
