<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'tb_barang';

    protected $fillable = [
        'nama', 'spesifikasi', 'id_satuan', 'id_category' ,'foto'
    ];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
