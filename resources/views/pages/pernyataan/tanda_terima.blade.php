<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Hello, world!</title>
  </head>
  <body>

        <div class="container bg-transparent p-3">
            <h3 class="text-center font-weight-bolder"><u>TANDA TERIMA PENYALURAN PINJAMAN & PENGAKUAN HUTANG</u></h3>
            <br>
            <p>Pada hari ini, Selasa tanggal {{ tanggalIndonesia(date('m F Y')) }} </p>
            <table>
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
                    <td>Tempat</td>
                    <td>:</td>
                    <th>Rumah Ketua</th>
                </tr>
            </table>
            <br>
            <ol type="1">
                <li>
                    <p>Telah menerima penyaluran pinjaman dari UPK PNPM Mandiri Perdesaan Kecamatan Plumpang </p>
                </li>
                <li>
                    <p> Dengan sadar dan penuh tanggung jawab mengakui memiliki hutang kepada UPK PNPM Mandiri Perdesaan Kecamatan Plumpang dan kelompok sebesar jumlah pinjaman beserta jasa pinjaman yang diberlakukan, sebagaimana tercantum dalam tabel di bawah ini </p>
                </li>
                <li>
                    <p> Bersedia memenuhi segala ketentuan yang berlaku dan sanggup menerima sanksi apapun apabila melakukan pelanggaran.
                    </p>
                </li>
            </ol>
            <br>

            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jumlah Pinjaman</th>
                        <th>Jasa Pinj. UPK</th>
                        <th>Jasa pinj. kelompok</th>
                        <td>Tanda Tangan</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pernyataan->anggota as $key => $anggota)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $anggota->nama }}</td>
                            <td>{{ $anggota->alamat }}</td>
                            <td>{{ number_format($anggota->total_pinjaman,2,',','.') }}</td>
                            <td>{{ number_format($anggota->total_pinjaman*$pernyataan->jasa_pinjaman/100,2,',','.') }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
