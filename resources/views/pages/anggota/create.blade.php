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
                <h4 class="page-title">Tambah Anggota Kelompok: <span class="text-danger">{{ $nasabah->nama }}</span></h4>
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
                    <form action="{{ route('anggota.store', ['id' => $nasabah->id]) }}" method="post">

                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <label for="nama_kelompok">Nama</label>
                                    <input type="text" class="form-control bg-gray" name="nama" placeholder="Masukan nama anggota">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <select required id="jabatan" class="form-control" name="jabatan">
                                            <option value="">Pilih Jabatan</option>
                                            <option value="Ketua">Ketua</option>
                                            <option value="Sekretaris">Sekretaris</option>
                                            <option value="Bendahara">Bendahara</option>
                                            <option value="Anggota">Anggota</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="5" placeholder="Masukan alamat anggota">{{ old('alamat_kelompok') }}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="total_pinjaman">RT</label>
                                    <input type="text" class="form-control" placeholder="RT" name="rt" value="{{ old('rt') }}">
                                </div>

                                <div class="col-md-3">
                                    <label for="jasa_pinjaman">RW</label>
                                    <input type="text" class="form-control" placeholder="RW" name="rw" value="{{ old('rw') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="total_pinjaman">Jenis Usaha</label>
                                    <input type="text"  class="form-control" placeholder="Masukan jenis usaha" name="jenis_usaha" value="{{ old('jenis_usaha') }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="total_pinjaman">Total Pinjaman</label>
                                    <input type="text" id="total_pinjaman" class="form-control" placeholder="Masukan total pinjaman" name="total_pinjaman" value="{{ old('total_pinjaman') }}">
                                    <p class="font-16 font-weight-bold" id="total_pinjaman_rupiah"></p>
                                </div>
                                <div class="col-md-6">
                                    <label for="ahli_waris">Ahli Waris</label>
                                    <input type="text" class="form-control" placeholder="Ahli waris" name="waris" value="{{ old('rw') }}">
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

    <div class="row">
        <div class="col-12 mb-2">
            <a target="blank" href="{{ route('anggota.perjanjian-kredit', $nasabah->id) }}">
                <div class="btn btn-danger btn-sm"><i class="fa fa-print mr-1"></i>Perjanjian Kredit</div>
            </a>
            <a target="blank" href="{{ route('anggota.kuasa', $nasabah->id) }}">
                <div class="btn btn-danger btn-sm"><i class="fa fa-print mr-1"></i>Surat Kuasa</div>
            </a>
            <a target="blank" href="{{ route('anggota.pencairan', $nasabah->id) }}">
                <div class="btn btn-danger btn-sm"><i class="fa fa-print mr-1"></i>Surat Pencairan</div>
            </a>
            <a target="blank" href="{{ route('anggota.tanda-terima', $nasabah->id) }}">
                <div class="btn btn-danger btn-sm"><i class="fa fa-print mr-1"></i>Tanda Terima</div>
            </a>
            <a target="blank" href="{{ route('anggota.kuitansi-metrai', $nasabah->id) }}">
                <div class="btn btn-danger btn-sm"><i class="fa fa-print mr-1"></i>Kuitansi Materai</div>
            </a>

            <a target="blank" href="{{ route('anggota.kuitansi-non-metrai', $nasabah->id) }}">
                <div class="btn btn-danger btn-sm"><i class="fa fa-print mr-1"></i>Kuitansi No Materai</div>
            </a>

            <a target="blank" href="{{ route('anggota.kuitansi-iptw', $nasabah->id) }}">
                <div class="btn btn-danger btn-sm"><i class="fa fa-print mr-1"></i>Kuitansi IPTW</div>
            </a>
            <a target="blank" href="{{ route('anggota.rencanaAngsuran', $nasabah->id) }}">
                <div class="btn btn-danger btn-sm"><i class="fa fa-print mr-1"></i>Kuitansi IPTW</div>
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Daftar Anggota Nasabah : <span class="text-danger">{{ $nasabah->nama }}</span></h4>
                    <p class="text-muted font-13 mb-4">
                        Dibawah ini adalah data seluruh nasabah yang sedang melakukan peminjaman
                    </p>
                    <table id="basic-datatable" class="table dt-responsive table-bordered table-striped table-sm nowrap w-100">
                        <thead>
                            <tr>
                                <th class="align-middle text-center">#</th>
                                <th class="align-middle text-center">Jabatan</th>
                                <th class="align-middle text-center">Nama</th>
                                <th class="align-middle text-center">Alamat</th>
                                <th class="align-middle text-center">RT/RW</th>
                                <th class="align-middle text-center">Jenis Usaha</th>
                                <th class="align-middle text-center">Pinjaman</th>
                                <th class="align-middle text-center">Ahli Waris</th>
                                <th class="align-middle text-center">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggotas as $key => $anggota)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $anggota->jabatan }}</td>
                                    <td>{{ $anggota->nama }}</td>
                                    <td>{{ $anggota->alamat }}</td>
                                    <td>{{ $anggota->rt . '/' . $anggota->rw }}</td>
                                    <td>{{ $anggota->jenis_usaha }}</td>
                                    <td>Rp. {{ number_format($anggota->total_pinjaman, 2, ',', '.') }}</td>
                                    <td>{{ $anggota->ahli_waris }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('anggota.edit', $anggota->id) }}">
                                            <button class="btn btn-warning btn-sm mr-1"><i class="fa fa-edit"></i></button>
                                        </a>

                                        <a href="{{ route('anggota.pernyataan', $anggota->id) }}">
                                            <button class="btn btn-danger btn-sm mr-1"><i class="fa fa-file-pdf"></i></button>
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
<script src="{{ url('/') }}/assets/js/pages/datatables.init.js"></script>
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
