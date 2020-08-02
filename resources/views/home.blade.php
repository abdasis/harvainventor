@extends('layouts.app')

@section('content')
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
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                        <i class="fe-dollar-sign font-22 avatar-title text-white"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h6 class="mt-1">Rp. <span data-plugin="counterup">{{ number_format($nasabahs->sum('total_pinjaman')) }}</span></h6>
                        <p class="text-muted mb-1 text-truncate">Total Pinjaman</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                        <i class="fe-shopping-cart font-22 avatar-title text-white"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $angsurans->count() }}</span></h3>
                        <p class="text-muted mb-1 text-truncate">Angsuran {{ date('F') }}</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                        <i class="fe-users font-22 avatar-title text-white"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $nasabahs->count() }}</span></h3>
                        <p class="text-muted mb-1 text-truncate">Total Nasabah</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                        <i class="fe-eye font-22 avatar-title text-white"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ App\Models\Angsuran::whereDay('created_at', date('d'))->count() }}</span></h3>
                        <p class="text-muted mb-1 ">Bayar Hari  Ini</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
</div>

<div class="row">

    <div class="col-md-8 mb-2">
        <div class="row align-self-center">
            <div class="col-6">
                <a href="{{ route('angsuran.rekap-bulanan', ['bulan' => date('m')]) }}">
                    <button class="btn btn-danger"><i class="mdi mdi-printer mr-1"></i>Print Data Angsuran</button>
                </a>
            </div>
        </div>

    </div>
    <div class="col-8">

        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Data Semua Angsuran</h4>
                <p class="text-muted font-13">
                    Data seluruh angsuran yang dibayar oleh nasabah
                </p>
                <div class="row justify-content-end">
                    <div class="col-md-4 mr-">
                        <div class="container">
                            <form action="{{ route('nasabah.dashboard') }}"  class="form-inline mb-1" method="get">
                                <div class="form-group">
                                    <input type="text" id="range-datepicker" name="filter_tanggal" class="form-control form-control-sm rounded-0" placeholder="{{ Session::get('filter') ?? '2018-10-03 to 2018-10-10' }}">
                                    <button type="submit" class="btn btn-sm shadow-none rounded-0 btn-blue "><i class="mdi mdi-filter"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table id="basic-datatable" class="table dt-responsive table-sm nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Nasabah</th>
                            <th>Angsuran Ke</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Sisa</th>
                            <th>Dibayar</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($angsurans as $key => $angsuran)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $angsuran->nasabah->nama }}</td>
                            <td>{{ $angsuran->angsuran_ke }}</td>
                            <td>{{ date('d-m-Y', strtotime($angsuran->tanggal_pembayaran)) }}</td>
                            <td>Rp. {{ number_format($angsuran->sisa, 2, ',', '.') }}</td>
                            <td>{{ date('d-m-Y', strtotime($angsuran->tanggal_pembayaran)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <h4 >Total Angsuran Bulan Ini: Rp. <span class="text-danger font-weight-bolder">{{ number_format($totalAngsuran, 2, ',','.') }}</span></h4>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->

    <div class="col-4">

        <div class="card">
            <div class="card-body">
                <div class="card-title"><h4>Nasabah yang belum bayar bulan ini</h4></div>
                <p class="text-muted font-13">Dibawah ini nasabah yang belum bayar bulan ini</p>
                <table id="basic-datatable" class="table dt-responsive table-sm nowrap w-100">
                    <thead>
                        <tr>
                            <td>Nomor</td>
                            <td>Nama</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nasabahBelumBayar as $belumBayar)
                        <tr>
                            <td>{{ $belumBayar->nomor }}</td>
                            <td>{{ $belumBayar->nama }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
<script src="{{ url('/') }}/assets/libs/flatpickr/flatpickr.min.js"></script>
<script src="{{ url('/') }}/assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="{{ url('/') }}/assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
<script src="{{ url('/') }}/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{ url('/') }}/assets/js/pages/form-pickers.init.js"></script>
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
