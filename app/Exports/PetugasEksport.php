<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PetugasEksport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return User::query();
    }
    public function map($petugas):array {
        return [
            $petugas->name,
            $petugas->email,
            $petugas->password,
            $petugas->level
        ];
    }
    public function headings(): array{
        return [
            'nama',
            'email',
            'password',
            'level'
        ];
    }
}
