<?php

namespace App\Exports;

use App\Models\Angsuran;
use App\Models\Nasabah;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AngsuranBulananExport implements FromQuery, WithHeadings, ShouldAutoSize
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Nomor',
            'Nama Nasabah',
            'Total Angsuran',
            'Tanggal Pembayaran'
        ];
    }

    public function thisMonth(int $month)
    {
        $this->month = $month;
        return $this;
    }
    public function query()
    {
        return Nasabah::query()->join('angsurans', 'angsurans.nasabah_id', '=', 'nasabahs.id')
                        ->select('nasabahs.nomor', 'nasabahs.nama','angsurans.pokok_dibayar', 'angsurans.created_at')
                        ->whereMonth('angsurans.created_at', $this->month);
    }
}




