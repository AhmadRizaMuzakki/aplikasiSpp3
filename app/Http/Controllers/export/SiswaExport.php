<?php

namespace App\Http\Controllers\export;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Http\Controllers\Controller;

class SiswaExport extends Controller
{
    function export(){
        return (new UsersExport)->download('dataSiswa.xlsx' ,\Maatwebsite\Excel\Excel::XLSX);
    }
}
