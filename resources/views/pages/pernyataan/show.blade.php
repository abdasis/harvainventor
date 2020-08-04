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
            <h3 class="text-center font-weight-bolder"><u>SURAT PENYATAAN</u></h3>
            <br>
            <p>Yang bertanda tangan dibawah ini:</p>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <th>{{ $pernyataan->nama }}</th>
                </tr>

                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <th>{{ $pernyataan->jabatan }}</th>
                </tr>

                <tr>
                    <td>Kelompok</td>
                    <td>:</td>
                    <th>{{ $pernyataan->nasabah->nama }}</th>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <th>{{ $pernyataan->alamat . ',' . $pernyataan->rt . '/' . $pernyataan->rw }}</th>
                </tr>

                <tr>
                    <td>Desa</td>
                    <td>:</td>
                    <th>{{ $pernyataan->nasabah->desa }}</th>
                </tr>
            </table>
            <br>
            <ol type="1">
                <li>
                    <p>Bahwa saya Ketua dan atas nama anggota Kelompok SPP mengaku telah menerima dana pinjaman dari Unit Pengelola Kegiatan (UPK) PNPM Mandiri Perdesaan Kecamatan Plumpang:
                        <br>
                    Sebesar: <b>Rp. {{ number_format($pernyataan->nasabah->total_pinjaman, 2, ',', '.') }}</b>
                    </p>
                </li>
                <li>
                    <p>Pinjaman tersebut tertuang dalam Surat Perjanjian kredit nomor : *** 067/SPP-03/ VIII /2020, tanggal 04 Agustus 2020 *** yang ditanda tangin oleh Pengurus Kelompok dan ketua UPK mengetahui Kepala Desa sebagai saksi</p>
                </li>
                <li>
                    <p>Atas pinjaman tersebut saya ketua dan atas nama anggota Kelompok SPP bersedia untk menjadmin dan bertanggung jawab atas pengembalian pinjaman pokok beserta jasa pinjaman {{ $pernyataan->nasabah->jasa_pinjaman*12 }}% pertahun atau {{ $pernyataan->nasabah->jasa_pinjaman }}% perbulan dari total jumlah pinjaman dengan cara diangsur {{ $pernyataan->nasabah->jumlah_angsuran }} kali dalam satu tahun sesuai dengan Rencana Angsuran Kelompok ke UPK dan ketentuan yang tercantum dalam Surat Perjanjian Kredit sebagaimana dimaksud point 2 diatas </p>
                </li>
                <li>
                    <p>Apabila dikemudian hari saya selaku Ketua dan atas nama anggota Kelompok SPP tidak dapat memenuhi pernyataan ini, maka saya bersedia menerima sanksi apapun sesuai dengan ketentuan dan hukum yang berlaku</p>
                </li>
            </ol>
            <br>
            Demikian Surat Pernyataan pengakuan pinjaman ini dibuat untuk dipergunakan sebagaimana mestinya dan dapat dipertanggung jawabkan

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
                        Mengetahui,
                        <br>
                        <b>Ketua UPK</b>
                        <br>
                        <b>Kecamatan Pelumpan</b>

                    </p>

                    <div class="py-5"></div>
                    <b>DJITO,S.PD</b>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <p>
                        Dibuat Oleh,
                        <br>
                        <b>Ketua Kelompok</b>
                        <br>
                        <b>{{ $pernyataan->nasabah->nama }}</b>

                    </p>

                    <div class="py-5"></div>
                    <b>{{ $pernyataan->nasabah->ketua }}</b>
                </div>
            </div>
        </div>

    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
