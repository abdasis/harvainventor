
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
            <h3 class="text-center font-weight-bolder"><u>SURAT PERJANJIAN KREDIT</u></h3>
            <br>
            <table>
                <tbody>
                    <tr>
                        <th>NOMOR KELOMPOK</th>
                        <th>:</th>
                        <th>{{ $nasabah->nomor }}</th>
                    </tr>
                    <tr>
                        <th>NOMOR PERJANJIAN</th>
                        <th>:</th>
                        <th>067/SPP-03/VIII/2020</th>
                    </tr>
                </tbody>
            </table>
            <br>
            <p>Dengan memohon Rahmat Tuhan Yang Maha Esa serta kesadaran akan cita-cita luhur PNPM Mandiri Perdesaan Untuk mencapai kemajuan ekonomi dan kemakumran ebrsama, maka saya yang bertanda tangan dibawah ini:</p>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <th>DJITO, S.PD</th>
                </tr>

                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <th>Ketuan UPK Kecamatan Pelumpang</th>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <th>Dusun Morosemo, Desa Sumberagung, Kecamatan Plumpang</th>
                </tr>

            </table>
            <p>Dalam hal ini bertindak untuk dan atas nama Pengurus UPK selakuu pengelola pelayanan kegiatan Simpan Pinjam Kelompok Perempuan (SPP) dan Usaha Ekonomoi Produktif (UEP) di Kecamatan Plumpang selanjutnya disebut pihak pertama, dan:</p>
            <br>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <th>{{ $nasabah->ketua }}</th>
                </tr>

                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <th>Ketua Kelompok</th>
                </tr>

                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <th>{{ $nasabah->sekretaris }}</th>
                </tr>

                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <th>Sekretaris Kelompok</th>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <th>{{ $nasabah->alamat}}</th>
                </tr>

            </table>
            <br>
            <p>
                Dalam hal ini bertindak untuk dan atas nama diri sendiri dan anggota-anggota Kelompok ***{{ $nasabah->nama . ' Desa ' . $nasabah->desa }}*** telah memberikan kuasa secara tertulis sebagaimana surat Kuasa terlampir yang menjadi bagian tidak terpisahkan dari dokumen perjanjian kredit ini, selanjutnya disebut pihak kedua.
            </p>
            <p>
                Pihak Pertama dan Pihak Kedua dalam kedudukan masing-masing seperti telah ditengkan diatas, pada hari ini ***{{ hariIndonesia(date('l')) }} tanggal {{ tanggalIndonesia(date('d F Y')) }}*** jam {{ date('h:m') }} WIB btertemapt di *** Rumah Kedua, *** Dengan sada dan sukarela menyatakan telah membuat perjanjian utang piutang dengan ketentuan-ketentuan yang disepakatai bersama sebagai berikut:
            </p>
            <br>
            <p class="text-center font-13"><b>Pasal 1</b></p>
            <ol type="1">
                <li>
                    <p>
                        Pihak Pertama setuju memberikan pinjaman kepada pihak Kedua sebesar ***Rp. {{ toRupiah($nasabah->total_pinjaman, 2,',','.') }},- ({{ terbilang($nasabah->total_pinjaman) }} Rupiah)*** yaitu jumlah yang telah diputuskan dalam Musyawarah Tim Pendanaan atau Musyawarah Khusus Perguliran pada tanggal ***{{ tanggalIndonesia($nasabah->created_at) }}*** berdasarkan Permohonan dari Pihak Kedua dan para Pemberi Kuasa yang dilakukan secara kelompok sesuai Surat Permohonan Kredit dan hasil verifikasi kelompok
                    </p>
                </li>
                <li>
                    <p>Pihak Kedua dan Para Pemberi kuasa, mengaku telah menerima uang dalam jumlah sebagaimana yang diterangkan pada ayat 1 diatas, yang mana telah dibayar sesuai jumlah pinjamannya masing-masing dan dibuktikan secara sah dengan daftar tanda terima pinjaman terlampir, yang berlaku sebagai Surat Pengakuan Utang, baik perorangan maupun kelompok secara tanggung renteng.</p>
                </li>
            </ol>

            <p class="text-center font-13"><b>Pasal 2</b></p>
            <p>Kedua belah Pihak secara sukarela menerima syarat-syarat Perjanjian utang piutang sebagaimana dinyatakan dalam ketentuan- ketentuan dibawah ini :</p>
            <ol type="1">
                <li>
                    <p>
                        Dana pinjaman akan dipergunakan untuk kegiatan usaha guna meningkatkan pendapatan dan kualitas kehidupan keluarga. Dengan demikian pinjaman ini akan memberikan manfaat sebesar-besarnya bagi pertumbuhan ekonomi serta perkembangan anggota keluarga Pihak Kedua dan Pihak Pemberi Kuasa.
                    </p>
                </li>
                <li>
                    <p>Atas pinjaman tersebut dikenakan jasa pinjaman {{ $nasabah->jasa_pinjaman*12 }} % tetap pertahun atau {{ $nasabah->jasa_pinjaman }}% perbulan.</p>
                </li>
                <li>
                    <p>Pinjaman akan dibayar kembali dalam jangka waktu ***{{ $nasabah->jangka_pinjaman }} bulan***, terhitung dari bulan ***{{ tanggalIndonesia($nasabah->tanggal_pencarian) }} Sampai dengan bulan {{ tanggalIndonesia(date('F Y', strtotime(" +$nasabah->jangka_pinjaman months", strtotime($nasabah->tanggal_pencarian)))) }}*** dengan cara angsuran bulanan, yaitu pokok pinjaman sebesar ****Rp. {{ $nasabah->besar_pokok }},- dan jasa pinjaman sebesar Rp. {{ number_format($nasabah->besar_jasa, 2, ',','.') }},- pada setiap tanggal {{ date('d', strtotime($nasabah->created_at)) }} sampai lunas***.</p>
                </li>
                <li>
                    <p>
                        Apabila terjadi pelunasan sebelum jadwal pembayaran angsuran terakhir, maka pihak kedua tetap wajib membayar pokok pinjaman dan jasa secara keseluruhan.
                    </p>
                </li>
                <li>
                    <p>
                        Kelompok yang pembayaran angsurannya lancar akan mendapat IPTW (Insentif Pengembalian Tepat Waktu) sebesar 5% dari jumlah Bunga yg dibayarkan.
                    </p>
                </li>
                <li>
                    Angsuran Kelompok dikatakan lancar apabila Pembayaran Angsuran kelompok paling lambat 5 hari terhitung sejak tanggal Pencairan Pinjaman.
                </li>
                <li>
                    <p>
                        Apabila Pihak kedua dan Para Pemberi Kuasa membayar angsuran dalam jumlah dan waktu yang tidak sesuai dengan yang tertera pada jadwal angsuran, maka pembayaran akan diperhitungkan dengan urutan sebagai berikut: pembayaran kewajiban bunga, pembayaran tunggakan pokok dan kemudian kewajiban pembayaran pokok untuk bulan yang berjalan.
                    </p>
                </li>
                <li>
                    <p>
                        Apabila Anggota kelompok ada yang meninggal maka yang bersangkutan dibebaskan dari angsuran dan dianggap Anggota tersebut lunas dengan syarat menyerahkan Surat Kematian dari Desa
                    </p>
                </li>
                <li>
                    <p>
                        Ketentuan-ketentuan lain yang terkait dengan kegiatan simpan pinjam yang dikelola UPK PNPM Mandiri Perdesaan Kecamatan Plumpang baik yang ditetapkan pemerintah maupun Musyawarah Antar Desa yang belum tercantum dalam surat perjanjian ini manjadi bagian tak terpisahkan sari surat perjanjian ini
                    </p>
                </li>
            </ol>
            <p class="text-center font-13"><b>Pasal 3</b></p>
            <ol type="1">
                <li>
                    Pihak pertama berkewajiban mendampingi Pihak Kedua dan Para Pemberi Kuasa, agar dapat menggunakan dana pinjamannya untuk mengembangkan usaha, dan memperbaiki pengaturan keuangan rumah tangga. Dengan demikian angsuran pinjaman dapat dibayar secara lancar sambil tetap memberikan manfaat yang setinggi-tingginya bagi kemajuan ekonomi keluarga.
                </li>
                <li>
                    Pihak Kedua dan para Pemberi Kuasa sadar dan mengerti bahwa mengembalikan pinjaman secara lancar sesuai jadwal yang disepakati, merupakan kewajiban hukum sekaligus menunjukkan budi pekerti luhur untuk mengembangkan semangat tolong menolong dengan saudaranya sesama warga desa yang lain. Pengembalian pinjaman secara lancar akan memperluas kesempatan untuk memperoleh pinjaman berikutnya serta membuka peluang bagi orang lain mendapat giliran pelayanan.
                </li>
            </ol>
            <p class="text-center font-13"><b>Pasal 4</b></p>
            <ol type="1">
                <li>
                    Apabila terjadi silang selisih berkenaan dengan hak serta kewajiban yang timbul atas perjanjian utang piutang ini, akan diselesaikan secara musyawarah untuk mencapai kata sepakat. Apabila tidak dapat dicapai kata sepakat, Kedua belah pihak setuju untuk menunjuk Pengadilan Negeri Kabupaten Tuban sebagai upaya hukum menyelesaikan persengketaan tersebut.
                </li>
                <li>
                    Pihak Kedua menyatakan secara sadar dan sukarela telah menandatangani akad atau perjanjian pinjaman ini, setelah terlebih dahulu membacakan isi perjanjian ini kepada para Pemberi Kuasa dengan sejelas-jelasnya dan tidak seorangpun diantaranya menyatakan keberatan
                </li>
            </ol>
            <br>
            Demikian Surat Pernyataan pengakuan pinjaman ini dibuat untuk dipergunakan sebagaimana mestinya dan dapat dipertanggung jawabkan

            <div class="row justify-content-center mt-4">
                <div class="col-md-4 text-center">
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <p class="text-right">
                        {{ $pernyataan->desa }}, {{ tanggalIndonesia(date('d F Y')) }}
                    </p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-3 text-center">
                    <p>Mengetahui</p>
                    <div class="py-5"></div>
                    <b><u>{{ $nasabah->kepala_desa }}</u></b>
                    <br>
                    Kepala Desa
                </div>
                <div class="col-md-3 text-center">
                    <p>Pihak Pertama</p>
                    <div class="py-5"></div>
                    <b><u>DJITO, S.pd</u></b>
                    <br>
                    Ketua UPK
                </div>
                <div class="col-md-3 text-center">
                    <p>Pihak Kedua</p>
                    <div class="py-5"></div>
                    <b><u>{{ $nasabah->ketua }}</u></b>
                    <br>
                    Ketua Kelompok
                </div>
                <div class="col-md-3 text-center">
                    <p>Pihak Kedua</p>
                    <div class="py-5"></div>
                    <b><u>{{ $nasabah->sekretaris }}</u></b>
                    <br>
                    Sekretaris Kelompok
                </div>
            </div>
        </div>

    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
