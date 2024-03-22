<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasukBarang extends Model
{
    use HasFactory;

    protected $table = 'tb_masuk_barang';

    protected $fillable = [
        'id_barang',
        'no_faktur',
        'tanggal_masuk',
        'jumlah',
        'status',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function category()
    {
        // Assuming Barang model has category_id as foreign key
        return $this->belongsTo(Category::class, 'id_barang', 'id_category');
    }

    public function satuan()
    {
        // Assuming Barang model has satuan_id as foreign key
        return $this->belongsTo(Satuan::class, 'id_barang', 'id_satuan');
    }
}
