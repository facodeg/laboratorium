<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class export extends Model
{
    use HasFactory;

    protected $table = 'view_barang_stock';


    protected $fillable = [
        'id',
        'Nama',
        'spesifikasi',
        'satuan',
        'category',
        'jumlah',
    ];
}
