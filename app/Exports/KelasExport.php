<?php

namespace App\Exports;

use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KelasExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Kelas::query();
    }
    public function map($kelas):array {
        return [
            $kelas->nama_kelas,
            $kelas->kopetensi_keahlian
        ];
    }
    public function headings():array{
        return [
            'Nama Kelas',
            'Kompetensi keahlian',
        ];
    }
}
