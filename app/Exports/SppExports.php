<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SppExports implements FromQuery,WithMapping, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Siswa::query();
    }
    public function map($spp): array{
        return [
            $spp->nis,
            $spp->nama,
            $spp->kelas->nama_kelas,
            $spp->spp->nominal,
            $spp->spp->tahun
        ];
    }

    public function headings(): array
    {
        return [
            'nis',
            'nama',
            'kelas',
            'nominal',
            'tahun'
        ];
    }
}
