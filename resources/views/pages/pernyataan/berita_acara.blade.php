<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Berita Acara Pencaira {{ $pernyataan->nama }}</title>
  </head>
  <body>

        <div class="container bg-transparent p-3">
            <h3 class="text-center font-weight-bolder"><u>BERITA ACARA PENCAIRAN DANA</u></h3>
            <table class="table table-sm table-borderless table-responsive">
                <tr>
                    <td colspan="3">Pada hari ini, Selasa tanggal 04 Agustus 2020 telah dilaksanakan pencairan dana Perguliran SPP ke:</td>
                </tr>
                <tr>
                    <td>Anggota Kelompok</td>
                    <td>:</td>
                    <th>{{ $pernyataan->nama }}</th>
                </tr>

                <tr>
                    <td>Desa</td>
                    <td>:</td>
                    <th>{{ $pernyataan->desa }}</th>
                </tr>
                <tr>
                    <td>Sejumlah</td>
                    <td>:</td>
                    <th>{{ number_format($pernyataan->total_pinjaman, 2,',', '.') }}</th>
                </tr>
            </table>

            <br>
            <p>
                Yang dihadiri oleh Pengurus dan Anggota Kelompok SPP (SPK, Surat Pernyataan dan Surat Rekomendasi Pencairan terlampir),
            </p>

            <br>

            <p>
                Demikian Berita Acara ini kami buat untuk digunakan sebagaimana mestinya dan dapat dipertanggung jawabkan.
            </p>

            <br>

            <div class="row justify-content-center mt-4">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <p class="text-center">
                        Penidon, {{ date('d F Y') }}
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <p>
                        <b>Ketua UPK Kec. Plumpang</b>
                        <br>

                    </p>

                    <div class="py-5"></div>
                    <b>DJITO,S.Pd</b>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <p>
                        <b>Ketua Kelompok</b>
                        <br>

                    </p>

                    <div class="py-5"></div>
                    <b>{{ $pernyataan->ketua }}</b>
                </div>
            </div>

            <p class="text-center"><b><u>Mengetahui dan Menyetujui</u></b></p>

            <table class="table table-sm table-bordered ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Tanda Tangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pernyataan->anggota as $key => $anggota)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $anggota->nama }}</td>
                            <td>{{ $anggota->jabatan }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
