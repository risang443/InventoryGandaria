<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_barang';
    public $incrementing = false;

    protected $fillable = [
        'id_barang', 'namabarang', 'kategori_id', 'harga', 'ketersedian', 'stok'
    ];

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_barang');
    }
}
