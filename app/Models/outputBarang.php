<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutputBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barang',
        'costumers_id',
        'jumlah',
        'tanggal_output',
        'fotoInvoiceOutput',
        'keterangan'
    ];

    // Define the relationship with the Customer model
    public function customer()
    {
        return $this->belongsTo(Costumer::class, 'costumers_id');
    }

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_barang');
    }
}

