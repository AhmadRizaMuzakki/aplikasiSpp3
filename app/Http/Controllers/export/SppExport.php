<?php

namespace App\Http\Controllers\export;

use App\Exports\SppExports;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SppExport extends Controller
{
    function export()  {
        return (new SppExports)->download('dataSpp.xlsx',\Maatwebsite\Excel\Excel::XLSX);
    }
}
