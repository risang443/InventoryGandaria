<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anomalies extends Model
{
    use HasFactory;
    protected $table = 'opname';
    protected $fillable = [
        'id_barang', 'status', 'quantity', 'occurred_at', 'keterangan', 
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_barang');
    }
}
