<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'tb_transaksi';

    protected $fillable = [
        'id_barang',
        'no_pengeluaran',
        'tanggal_keluar',
        'jumlah_keluar',
        'jumlah_sisa',
        'status',
        'id_user',
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

    public function stock()
    {
        // Assuming Barang model has satuan_id as foreign key
        return $this->belongsTo(Stock::class, 'id_barang');
    }
}
