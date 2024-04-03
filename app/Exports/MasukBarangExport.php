<?php

namespace App\Exports;

use App\Models\export;
use Maatwebsite\Excel\Concerns\FromCollection;

class MasukBarangExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return export::all();
    }
}
