<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'notelp', 'alamat'];

    public function outputBarang()
    {
        return $this->hasMany(OutputBarang::class);
    }
}
