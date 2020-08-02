@php
    $nasabah_id = App\Models\Nasabah::where('nama', $nasabah->nama)->value('id');
    function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " Belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " Seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " Seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
		}
		return $temp;
	}

	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}
		return $hasil;
	}
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Angsuran {{ date('d-m-Y') }} {{ $nasabah->nama }}</title>
    <style>
        /*yang ini buat setting ukuran kertasnya assumsi A4 */
        #A4 {
            background-color:#FFFFFF;
            left:5px;
            right:5px;
            height:5.51in ; /*Ukuran Panjang Kertas */
            width: 8.50in; /*Ukuran Lebar Kertas */
            margin:1px solid #FFFFFF;
            font-family:Georgia, "Times New Roman", Times, serif;
        }

    </style>
</head>
<body>

        <div id="A4">
            <p align='center'>UNIT PENGELOLA KEGIATAN</p>
            <p align='center'>PNPM MANDIRI PERDESAAN</p>
            <p align='center'>KECAMATAN PLUMPANG - KABUPATEN TUBAN</p>
            <p align='center'>Kantor : Jalan Raya Plumpang - Tuban Km 17 kode pos 62382</p>
            <hr>
            <p align="center">KWITANSI ANGSURAN SPP/UEP</p>
            <table>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td><p>Nomor Kelompok</p></td>
                                <td>:</td>
                                <td>{{ $nasabah->nomor }}</td>
                            </tr>
                            <tr>
                                <td><p>Nama Kelompok</p></td>
                                <td>:</td>
                                <td>{{ $nasabah->nama }}</td>
                            </tr>
                            <tr>
                                <td><p>Jenis Pinjaman</p></td>
                                <td>:</td>
                                <td>SPP</td>
                            </tr>
                            <tr>
                                <td><p>Besar Angsuran</p></td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td><p align="right">Pokok</p></td>
                                <td>:</td>
                                <td>{{ number_format($angsuran->pokok_dibayar, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td><p align="right">Jasa</p></td>
                                <td>:</td>
                                <td>{{ number_format($angsuran->jasa_dibayar, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td><p align="right">Total</p></td>
                                <td>:</td>
                                <td>Rp. {{ number_format($angsuran->jasa_dibayar+$angsuran->pokok_dibayar, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Terbilang</td>
                                <td>:</td>
                                <td>
                                    @php
                                        $jumlahTotal = $angsuran->jasa_dibayar+$angsuran->pokok_dibayar;
                                    @endphp
                                    {{ terbilang($jumlahTotal) }}
                                </td>
                            </tr>


                        </table>
                    </td>
                    <td>
                        <table style="margin-left: 130px">
                            <tr>
                                <td><P>Angsuran Ke</P></td>
                                <td>:</td>
                                <td>{{ $angsuran->angsuran_ke }}</td>
                            </tr>
                            <tr>
                                <td><P>Desa</P></td>
                                <td>:</td>
                                <td>KEDUNGROJO</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="padding: 40px 0">Plumpang, {{ date('D, d  m  Y H:i:s') }}</td>
                            </tr>
                            <tr>
                                <td align="center">Penyetor</td>
                                <td></td>
                                <td align="center">Penerima</td>
                            </tr>
                            <tr>
                                <td align="center" style="padding-top: 150px">
                                    <hr>
                                </td>
                                <td></td>
                                <td align="center" style="padding-top: 130px">
                                    {{ $nasabah->nama }}
                                    <hr>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

        </div>


</body>
</html>
