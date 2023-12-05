<?php

namespace App\Http\Controllers\export;

use App\Exports\KelasExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelassExport extends Controller
{
    function export()  {
        return (new KelasExport)->download('dataKelas.xlsx' ,\Maatwebsite\Excel\Excel::XLSX);
    }
}
