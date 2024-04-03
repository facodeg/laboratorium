<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MasukBarangExport;

class ExportController extends Controller
{
    public function exportToExcel()
    {
        return Excel::download(new MasukBarangExport, 'masuk_barang.xlsx');
    }
}
