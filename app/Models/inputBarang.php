<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barang',
        'suppliers_id',
        'stock',
        'store',
        'tanggal_input',
        'fotoInvoiceInput',
        'keterangan'
    ];

    // Define the relationship with the Supplier model
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'suppliers_id');
    }

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_barang');
    }
}
