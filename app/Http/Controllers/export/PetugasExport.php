<?php

namespace App\Http\Controllers\export;

use Illuminate\Http\Request;
use App\Exports\PetugasEksport;
use App\Http\Controllers\Controller;

class PetugasExport extends Controller
{
    function export()  {
        return (new PetugasEksport)->download('dataPetugas.xlsx' ,\Maatwebsite\Excel\Excel::XLSX);
    }
}
