<?php  

namespace App\Exports;

use App\Models\Kelas;
use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromQuery,WithHeadings,WithMapping
{
    use Exportable;
    public function query()
    {
        return Siswa::query();
    }
    public function map($invoice): array
    {
        return [
            $invoice->nis,
            $invoice->nama,
            $invoice->kelas->nama_kelas,
            $invoice->no_telp,
            $invoice->alamat

        ];
    }
    public function headings(): array
    {
        return [
            'nis',
            'nama',
            'kelas',
            'no_hp',
            'alamat'
        ];
    }

}