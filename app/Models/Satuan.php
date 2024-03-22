<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;

    protected $table = 'tb_satuan';

    protected $fillable = [
        'name'
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'id_satuan');
    }
}
