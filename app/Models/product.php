<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'namabarang', 'kategori_id', 'harga', 'ketersediaan', 'stok'
    ];

    public function kategori()
    {
        return $this->belongsTo(Category::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id');
    }

    public function inputBarangs()
    {
        return $this->hasMany(InputBarang::class, 'id_barang');
    }

    public function outputBarangs()
    {
        return $this->hasMany(OutputBarang::class, 'id_barang');
    }

}
