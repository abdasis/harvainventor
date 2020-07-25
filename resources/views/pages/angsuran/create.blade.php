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
                <h4 class="page-title">Catat Angsuran | {{ $nasabah->nama }}</h4>
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
                    @if ($sisaAngsuran != null && (int)$sisaAngsuran == 0)
                        <div class="alert alert-success">Angsuran Nasabah <b>{{ $nasabah->nama }}</b> Sudah Lunas</div>
                    @else
                        <form action="{{ route('angsuran.store') }}" method="post">

                            @csrf

                            <div class="card-text">
                                <div class="form-group">
                                    <label for="nama_nasabah">Nasabah</label>
                                    <input type="text" class="form-control" readonly name="nama_nasabah" value="{{ $nasabah->nama }}">
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="tanggal_pencarian">Tanggal Seharusnya</label>
                                            <input class="form-control" id="tanggal_seharusnya" type="date" name="tanggal_seharusnya">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tanggal_pencarian">Tanggal Dibayar</label>
                                            <input class="form-control" id="tanggal_pembayaran" type="date" name="tanggal_pembayaran">
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
                                        <input type="text" class="form-control" placeholder="Masukan jumlah pembayaran pokok" name="pokok_dibayar">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tunggakan">Tunggakan</label>
                                        <input type="text" class="form-control" placeholder="Masukan jumlah tunggakan pokok" name="pokok_tunggakan">
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
                                        <input type="text" class="form-control" placeholder="Masukan jumlah bayaran jasa" name="jasa_dibayar">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tunggakan">Tunggakan</label>
                                        <input type="text" class="form-control" placeholder="Masukan jumlah tunggakan jasa" name="jasa_tunggakan">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-blue waves-effect" type="submit"><i class="fa fa-save mr-1"></i>Simpan Data</button>
                                <button class="btn btn-danger waves-effect" type="reset"><i class="fa fa-undo-alt mr-1"></i>Reset</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-12">
            <a href="{{ route('angsuran.cetak-rekap', $nasabah->id) }}">
                <button class="btn btn-danger btn-sm"><i class="fas fa-cloud-download-alt mr-1"></i>Download Rekap</button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Data Pembayaran Angsuran</h4>
                    <p class="text-muted font-13 mb-4">
                        Dibawah ini adalah data seluruh nasabah yang sedang melakukan peminjaman
                    </p>
                    <table id="basic-datatable" class="table dt-responsive table-striped table-sm nowrap w-100">
                        <thead>
                            <tr>
                                <th rowspan="2" class="align-middle text-center">No. </th>
                                <th rowspan="2" class="align-middle text-center">Tanggal Seharusnya</th>
                                <th rowspan="2" class="align-middle text-center">Tanggal Pembayaran</th>
                                <th class="text-center" colspan="2">Pokok</th>
                                <th class="text-center" colspan="2">Jasa</th>
                                <th rowspan="2" class="align-middle text-center">Sisa</th>
                                <th rowspan="2" class="align-middle text-center">Option</th>
                            </tr>
                            <tr>
                                <th>Dibayar</th>
                                <th>Tunggakan</th>
                                <th>Dibayar</th>
                                <th>Tunggakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($angsurans as $key => $angsuran)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><b>{{ date('d-m-Y', strtotime($angsuran->tanggal_seharusnya)) }}</b></td>
                                    <td>{{ date('d-m-Y', strtotime($angsuran->tanggal_pembayaran)) }}</td>
                                    <td>Rp. {{ number_format($angsuran->pokok_dibayar, 2, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($angsuran->pokok_tunggakan, 2, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($angsuran->jasa_dibayar, 2, ',','.') }}</td>
                                    <td>Rp. {{ number_format($angsuran->jasa_tunggakan, 2, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($angsuran->sisa, 2, ',', '.') }}</td>
                                    <td class="align-self-center">
                                        <div class="form-group row">
                                            <a href="{{ route('angsuran.edit', $angsuran->id) }}" class="mr-1">
                                                <div class="btn-link text-blue btn-sm waves-ripple">
                                                    <i class="fas fa-pen-alt"></i>
                                                </div>
                                            </a>
                                            <div type="submit" class="btn-link text-danger btn-sm waves-ripple mr-1 btn-hapus" data-id="{{ $angsuran->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </div>
                                            <a href="{{ route('angsuran.print', $angsuran->id) }}">
                                                <div class="btn-link text-danger btn-sm waves-ripple">
                                                    <i class="fas fa-file-pdf"></i>
                                                </div>
                                            </a>
                                        </div>
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

            $('#jasa_pinjaman').keyup(function(event){
                let total_pinjaman = $('#total_pinjaman').val();
                let jasa_pinjaman = $('#jasa_pinjaman').val();
                if (total_pinjaman = "") {
                    $('#total_jasa').val(0);
                }else{
                    $('#total_jasa').val(total_pinjaman * jasa_pinjaman / 100);
                }
            })

            $('#total_pinjaman').keyup(function(){
                $('#total_pinjaman_rupiah').text(formatRupiah($('#total_pinjaman').val(), 'Rp.'))
            })

            $('#total_jasa').keyup(function(){
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
