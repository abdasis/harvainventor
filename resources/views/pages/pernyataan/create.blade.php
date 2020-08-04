@extends('layouts.app')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pernyataan</a></li>
                        <li class="breadcrumb-item active">Surat Penyataan</li>
                    </ol>
                </div>
                <h4 class="page-title">Surat Pernyataan</h4>
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
                    <form action="{{ route('pernyataan.store') }}" method="post">

                        @csrf
                        <div class="form-group">
                            <label for="nama_kelompok">Nama</label>
                            <input type="text" class="form-control bg-gray" name="nama" placeholder="Masukan Nama">
                        </div>

                        <div class="form-group">
                            <label for="nama_kelompok">Jabatan</label>
                            <input type="text" class="form-control bg-gray" name="jabatan" placeholder="Masukan Jabatan">
                        </div>

                        <div class="form-group">
                            <label for="nama_kelompok">Kelompok</label>
                            <input type="text" class="form-control bg-gray" name="kelompok" placeholder="Masukan Kelompok">
                        </div>

                        <div class="form-group">
                            <label for="nama_kelompok">Alamat</label>
                            <textarea class="form-control bg-gray" rows="3" name="alamat" placeholder="Masukan Alamat"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="nama_kelompok">Desa</label>
                            <input type="text" class="form-control bg-gray" name="desa" placeholder="Masukan Desa">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-blue waves-effect float-right" type="submit"><i class="fa fa-save mr-1"></i>Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Daftar Anggota Nasabah</h4>
                    <p class="text-muted font-13 mb-4">
                        Dibawah ini adalah data seluruh nasabah yang sedang melakukan peminjaman
                    </p>
                    <table id="basic-datatable" class="table dt-responsive table-bordered table-striped table-sm nowrap w-100">
                        <thead>
                            <tr>
                                <th class="align-middle text-center">#</th>
                                <th class="align-middle text-center">Nama</th>
                                <th class="align-middle text-center">Jabatan</th>
                                <th class="align-middle text-center">Kelompok</th>
                                <th class="align-middle text-center">Alamat</th>
                                <th class="align-middle text-center">Desa</th>
                                <th class="align-middle text-center">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pernyataans as $key => $pernyataan)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $pernyataan->name }}</td>
                                    <td>{{ $pernyataan->jabatan }}</td>
                                    <td>{{ $pernyataan->kelompok }}</td>
                                    <td>{{ $pernyataan->alamat }}</td>
                                    <td>{{ $pernyataan->desa }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('pernyataan.edit', $pernyataan->id) }}">
                                            <button class="btn btn-warning btn-sm mr-1"><i class="fa fa-edit"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card -->
        </div>
    </div>
@endsection


@section('js')
<script src="{{ url('/') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="{{ url('/') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ url('/') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{ url('/') }}/assets/libs/select2/js/select2.min.js"></script>
<script src="{{ url('/') }}/assets/js/pages/datatables.init.js"></script>
<script src="{{ url('/') }}/assets/js/pages/form-advanced.init.js"></script>
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

@section('css')
<!-- third party css -->
<link href="{{ url('/') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('/') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('/') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('/') }}/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- third party css end -->
@endsection
