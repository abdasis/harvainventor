@extends('layouts.app')


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Angsuran</a></li>
                        <li class="breadcrumb-item active">Catat</li>
                    </ol>
                </div>
                <h4 class="page-title">Sunting Angsuran | <span class="text-blue">{{ $nasabah->nama }}</span></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    @include('components.alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Catatan Pembayaran Angsuran
                </div>
                <div class="card-body">
                    <form action="{{ route('angsuran.update', $angsuran->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-text">
                            <div class="form-group">
                                <label for="nama_nasabah">Nasabah</label>
                                <input type="text" class="form-control" readonly name="nama_nasabah" value="{{ $nasabah->nama }}">
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="tanggal_pencarian">Tanggal Seharusnya</label>
                                        <input class="form-control" id="tanggal_seharusnya" value="{{ $angsuran->tanggal_seharusnya }}" type="date" name="tanggal_seharusnya">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tanggal_pencarian">Tanggal Dibayar</label>
                                        <input class="form-control" id="tanggal_pembayaran" value="{{ $angsuran->tanggal_pembayaran }}" type="date" name="tanggal_pembayaran">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="header-title text-blue">
                            Pokok
                        </h3>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="dibayar">Dibayar</label>
                                    <input type="text" class="form-control" value="{{ $angsuran->pokok_dibayar }}" placeholder="Masukan jumlah pembayaran pokok" name="pokok_dibayar">
                                </div>
                                <div class="col-md-6">
                                    <label for="tunggakan">Tunggakan</label>
                                    <input type="text" class="form-control" value="{{ $angsuran->pokok_tunggakan }}" placeholder="Masukan jumlah tunggakan pokok" name="pokok_tunggakan">
                                </div>
                            </div>
                        </div>

                        <h4 class="header-title text-blue">
                            Jasa Pinjaman
                        </h4>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="dibayar">Dibayar</label>
                                    <input type="text" class="form-control" value="{{ $angsuran->jasa_dibayar }}" placeholder="Masukan jumlah bayaran jasa" name="jasa_dibayar">
                                    <b class="text-success" id="jasa_dibayar_rupiah"></b>
                                </div>
                                <div class="col-md-6">
                                    <label for="tunggakan">Tunggakan</label>
                                    <input type="text" class="form-control" value="{{ $angsuran->jasa_tunggakan }}" placeholder="Masukan jumlah tunggakan jasa" name="jasa_tunggakan">
                                    <b class="text-danger" id="jasa_tunggakan_rupiah"></b>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-blue waves-effect" type="submit"><i class="fa fa-save mr-1"></i>Update Data</button>
                            <button class="btn btn-danger waves-effect" type="reset"><i class="fa fa-undo-alt mr-1"></i>Reset</button>
                        </div>
                    </form>
                </div>
            </div>
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
<script src="{{ url('/') }}/assets/js/pages/datatables.init.js"></script>

<script>

$('.btn-hapus').on('click', function(e){
    e.preventDefault();
    let id =  $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
                if (result.value) {
                    $.ajax({
                    url: "{{ url('/admin/angsuran/') }}" + '/' + id,
                    type: 'POST',
                    data: {id:id, _token:"{{ csrf_token() }}", _method:'DELETE'},
                    success: function (data) {
                        location.reload(true);
                        Swal.fire(
                            'Berhasil!',
                            'Data Berhasil Dihapus!',
                            'success'
                        )

                    }
                });
            }
        })
    });


    $(document).ready(function(){
        $('#jasa_dibayar').keyup(function(){
            alert('Ok')
            $('#jasa_dibayar_rupiah').text(formatRupiah($('#jasa_dibayar').val(), 'Rp.'))
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
