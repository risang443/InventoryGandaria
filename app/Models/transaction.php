<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barang', 'tipe', 'stok', 'tanggalTransaksi'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_barang');
    }
}
