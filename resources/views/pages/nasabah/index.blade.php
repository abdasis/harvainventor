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
    <div class="col-md-12 mb-2">
        <a href="{{ route('nasabah.create') }}">
            <button class="btn-blue btn waves-effect"><i class="fas fa-plus mr-1"></i>Tambah Nasabah Baru</button>
        </a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Data Seluruh Nasabah</h4>
                <p class="text-muted font-13 mb-4">
                    Dibawah ini adalah data seluruh nasabah yang sedang melakukan peminjaman
                </p>

                <table id="basic-datatable" class="table dt-responsive table-sm nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelompok</th>
                            <th>Total Pinjaman</th>
                            <th>Jumlah Angsuran</th>
                            <th>Tanggal Pencairan</th>
                            <th>Option</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($nasabahs as $key => $nasabah)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $nasabah->nama }}</td>
                            <td><b>Rp. {{ number_format( $nasabah->total_pinjaman, 2, ',', '.' ) }}</b></td>
                            <td><b>{{ $nasabah->jumlah_angsuran }}x angsuran</b></td>
                            <td>{{ date('d-m-Y', strtotime($nasabah->tanggal_pencarian)) }}</td>
                            <td class="row justify-content-center p-1">
                                <a href="{{ route('nasabah.edit', $nasabah->id) }}" class="mr-1">
                                    <div class="btn btn-warning btn-sm waves-ripple">
                                        <i class="fas fa-pen-alt"></i>
                                    </div>
                                </a>

                                <button type="submit" class="btn btn-danger btn-sm waves-ripple mr-1 btn-hapus" data-id="{{ $nasabah->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>

                                <a href="{{ route('nasabah.show', $nasabah->id) }}" class="mr-1">
                                    <div class="btn btn-blue btn-sm waves-ripple">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                </a>

                                <a href="{{ route('angsuran.create', $nasabah->id) }}">
                                    <div class="btn btn-success btn-sm waves-ripple">
                                        <i class="fas fa-cash-register"></i>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
@endsection


@section('js')
<!-- third party js -->
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
                url: "{{ url('/admin/nasabah/') }}" + '/' + id,
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
</script>
<!-- third party js ends -->
@endsection


@section('css')
<!-- third party css -->
<link href="{{ url('/') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('/') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('/') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('/') }}/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- third party css end -->
@endsection
