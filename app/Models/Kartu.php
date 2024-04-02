<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kartu extends Model
{
    use HasFactory;

    protected $table = 'v_kartu_stock'; // Sesuaikan dengan nama view

    // Jika view tidak memiliki primary key, tambahkan properti berikut
    protected $primaryKey = null;
    public $incrementing = false;

    // Definisikan kolom-kolom yang bisa diisi
    protected $fillable = [
        'id',
        'id_barang',
        'no_transaksi',
        'tanggal',
        'masuk',
        'keluar',
        'jumlah_sisa',
        'kondisi',
        'label',
        'id_user',
        'created_at',
        'updated_at',
        'source_table'
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

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
