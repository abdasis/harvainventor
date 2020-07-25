<p align='center'>UNIT PENGELOLA KEGIATAN</p>
<p align='center'>PNPM MANDIRI PERDESAAN</p>
<p align='center'>KECAMATAN PLUMPANG - KABUPATEN TUBAN</p>
<p align='center'>Kantor : Jalan Raya Plumpang - Tuban Km 17 kode pos 62382</p>
<hr>
<table>
    <tr>
        <td>Nomor Kelompok</td>
        <td>:</td>
        <td>{{ $nasabah->nomor }}</td>
    </tr>

    <tr>
        <td>Nama Kelompok</td>
        <td>:</td>
        <td>{{ $nasabah->nama }}</td>
    </tr>

    <tr>
        <td>Jenis Pinjaman</td>
        <td>:</td>
        <td>SPP</td>
    </tr>
    <tr>
        <td>Besar Angsuran</td>
        <td>:</td>
    </tr>
    <tr>
        <td>Pokok</td>
        <td>:</td>
        <td>{{ number_format($angsuran->pokok_dibayar, 2, ',', '.') }}</td>
    </tr>
    <tr>
        <td>Jasa</td>
        <td>:</td>
        <td>{{ number_format($angsuran->jasa_dibayar, 2, ',', '.') }}</td>
    </tr>
</table>
