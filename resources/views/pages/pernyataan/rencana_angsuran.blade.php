

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
            <h1 class="text-center font-weight-bolder">RENCANA ANGSURAN KELOMPOK ke UPK</h1>
            <br>
            <table class="table table-sm table-borderless table-responsive">
                <tr>
                    <td>JENIS KELOMPOK</td>
                    <td>:</td>
                    <th>{{ $pernyataan->jenis_pinjaman }}</th>
                </tr>

                <tr>
                    <td>NAMA KELOMPOK</td>
                    <td>:</td>
                    <th>{{ $pernyataan->nama }}</th>
                </tr>

                <tr>
                    <td>ALAMAT/DESA</td>
                    <td>:</td>
                    <th>{{ $pernyataan->desa }}</th>
                </tr>

                <tr>
                    <td>TOTAL PINJAMAN</td>
                    <td>:</td>
                    <th>Rp. {{ toRupiah($pernyataan->total_pinjaman) }}</th>
                </tr>

                <tr>
                    <td>JASA PINJAMAN</td>
                    <td>:</td>
                    <th>Rp. {{ toRupiah($pernyataan->total_pinjaman*$pernyataan->jasa_pinjaman/100) }}</th>
                </tr>
                <tr>
                    <td>TANGGAL PENCAIRAN</td>
                    <td>:</td>
                    <th>{{ tanggalIndonesia($pernyataan->tanggal_pencarian) }}</th>
                </tr>

                <tr>
                    <td>JANGKA WAKTU PINJAMAN</td>
                    <td>:</td>
                    <th>{{ tanggalIndonesia($pernyataan->tanggal_pencarian) }} s/d {{ tanggalIndonesia(date('F Y', strtotime(" +$pernyataan->jangka_pinjaman months", strtotime($pernyataan->tanggal_pencarian)))) }} *({{ $pernyataan->jangka_pinjaman }} bulan)*</th>
                </tr>

                <tr>
                    <td>JUMLAH ANGSURAN POKOK</td>
                    <td>:</td>
                    <th>{{ $pernyataan->jangka_pinjaman }} Bulan</th>
                </tr>

                <tr>
                    <td>JUMLAH ANGSURAN JASA</td>
                    <td>:</td>
                    <th>{{ $pernyataan->jangka_pinjaman }} Bulan</th>
                </tr>
                <tr>
                    <td class="text-right">BESAR ANGSURAN PER BULAN</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-right">POKOK</td>
                    <td>:</td>
                    <td>{{ toRupiah($pernyataan->total_pinjaman) }}</td>
                </tr>
                <tr>
                    <td class="text-right">JASA</td>
                    <td>:</td>
                    <td>{{ toRupiah($pernyataan->total_pinjaman * $pernyataan->jasa_pinjaman / 100) }}</td>
                </tr>
                <tr>
                    <td class="text-right">JUMLAH DIBAYARKAN</td>
                    <td>:</td>
                    <td>{{ toRupiah($pernyataan->total_pinjaman+$pernyataan->total_pinjaman*$pernyataan->jasa_pinjaman/100) }}</td>
                </tr>

            </table>

            <br>

            <div class="row justify-content-center mt-4">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <p class="text-center">
                        {{ $pernyataan->desa }}, {{ tanggalIndonesia(date('d F Y')) }}
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <p>
                        Mengetahui Dan Menyetujui
                        <br>
                        <b>Bendahara UPK</b>
                        <br>
                        <b>Kecamatan Pelumpang</b>
                    </p>

                    <div class="py-5"></div>
                    <b>DJITO,S.Pd</b>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <p>
                        <br>
                        <b>Ketua Kelompok</b>
                        <br>
                        <b>{{ $pernyataan->nama }}</b>

                    </p>

                    <div class="py-5"></div>
                    <b>{{ $pernyataan->ketua }}</b>
                </div>
            </div>

        </div>

    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
