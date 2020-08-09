<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Surat Kuasa {{ $pernyataan->nama }}</title>
  </head>
  <body>

        <div class="container bg-transparent p-3">
            <h3 class="text-center font-weight-bolder"><u>SURAT KUASA</u></h3>
            <table class="table table-sm table-borderless">
                <tr>
                    <td colspan="3">Yang bertanda tangan di bawah ini,</td>
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
                    <td colspan="3">Dengan sadar dan penuh tanggung jawab memberikan kuasa kepada : </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><b><u>{{ $pernyataan->ketua }}</u></b></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>Ketua Kelompok</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $pernyataan->alamat }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><b><u>{{ $pernyataan->sekretaris }}</u></b></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>Sekretaris Kelompok</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $pernyataan->alamat }}</td>
                </tr>
            </table>

            <br>
            <p>
                Untuk melakukan perjanjian dengan Unit Pengelola Kegiatan (UPK) PNPM Mandiri Perdesaan terkait dengan kegiatan Simpan Pinjam Kelompok Perempuan (SPP). Besarnya nilai pinjaman yang diperjanjikan adalah sebagaimana yang disetujui dan disahkan dalam Musyawarah Tim Pendanaan atau Musyawarah Khusus Perguliran.

            </p>

            <br>

            <p>
                Demikian surat kuasa ini di buat untuk dipergunakan sebagaimana mestinya.
            </p>

            <br>

            <p><b><u>Pemberi Kuasa</u></b></p>

            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanda Tangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pernyataan->anggota as $key => $anggota)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $anggota->nama }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

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
                        <b>Ketua Kelompok</b>
                        <br>

                    </p>

                    <div class="py-5"></div>
                    <b>{{ $pernyataan->ketua }}</b>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <p>
                        <b>Sekretaris Kelompok</b>
                        <br>

                    </p>

                    <div class="py-5"></div>
                    <b>{{ $pernyataan->sekretaris }}</b>
                </div>
            </div>

        </div>

    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
