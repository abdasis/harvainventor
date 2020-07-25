<?php

namespace App\Exports;

use App\Models\Angsuran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AngsuranExport implements FromQuery, WithHeadings, ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'Nomor',
            'Tanggal Seharusnya',
            'Tanggal Dibayar',
            'Dibayar',
            'Tunggakan',
            'Dibayar',
            'Tunggakan',
            'Siswa',
            'Penyetor',
            'Tandang Penyetor',
        ];
    }

    public function forNasbahId(int $nasabah_id)
    {
        $this->nasabah_id = $nasabah_id;
        return $this;

    }
    public function query()
    {
        return Angsuran::query()->select([
            'angsuran_ke',
            'tanggal_seharusnya',
            'tanggal_pembayaran',
            'pokok_dibayar',
            'pokok_tunggakan',
            'jasa_dibayar',
            'jasa_tunggakan',
            'sisa',
            'nama_penyetor',
            'ttd_penyetor',
        ])->where('nasabah_id', $this->nasabah_id);
    }
}
