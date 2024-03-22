<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'tb_stock';

    protected $fillable = [
        'id_barang',
        'stock',
    ];


    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
