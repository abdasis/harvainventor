

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
            <h1 class="text-center font-weight-bolder">UNIT PENGELOLA GIATAKAN <br> (UPK)</h1>
            <p class="text-center"><b>KECAMATAN PLUMPANG - KABUPATEN TUBAN - PROV. JATIM</b></p>
            <br>
            <h1 class="text-center"><u>KUITANSI</u></h1>
            <p class="text-center">NO: 067/SPP-03/VIII/2020</p>
            <table class="table table-sm table-borderless">
                <tr>
                    <td>Telah terima Dari</td>
                    <td>:</td>
                    <th>Unit Pengelola Kegiatan (UPK) Kecamatan Plumpang</th>
                </tr>

                <tr>
                    <td>Uang Sebesar</td>
                    <td>:</td>
                    <th>Rp. {{ toRupiah($pernyataan->total_pinjaman) }}</th>
                </tr>
                <tr>
                    <td>Terbilang</td>
                    <td>:</td>
                    <th>{{ terbilang($pernyataan->total_pinjaman) }}</th>
                </tr>
                <tr>
                    <td>Untuk Keperluan</td>
                    <td>:</td>
                    <td>
                        <table>
                            <tr>
                                <td>Dana Pinjaman</td>
                                <td>:</td>
                                <td>{{ $pernyataan->jenis_pinjaman }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Anggota</td>
                                <td>:</td>
                                <td>{{ $pernyataan->anggota->count() }}</td>
                            </tr>
                            <tr>
                                <td>Kelompok</td>
                                <td>:</td>
                                <td>{{ $pernyataan->nama }}</td>
                            </tr>
                            <tr>
                                <td>Desan</td>
                                <td>:</td>
                                <td>{{ $pernyataan->desa }}</td>
                            </tr>
                        </table>
                    </td>
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

            <div class="row justify-content-center mt-4">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <p class="text-center">
                        Penidon, {{ tanggalIndonesia(date('Y-m-d')) }}
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <p>
                        Lunas Dibayar
                        <br>
                        Bendahara UPK


                    </p>

                    <div class="py-5"></div>
                    <b>MARIYATI</b>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <p>
                        Yang Menerima
                        <br>
                        Ketua Kelompok

                    </p>

                    <div class="py-5"></div>
                    <b>{{ $pernyataan->ketua }}</b>
                </div>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-md-4">
                    <p class="text-center">
                        Setuju Dibayar
                        <br>
                        Ketua UPK
                    </p>
                    <div class="py-5"></div>
                    <p class="text-center">
                        DJITO,S.Pd
                    </p>
                </div>
            </div>

        </div>

    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
