<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'notelp','alamat','namaperusahaan'];

    public function inputBarang()
    {
        return $this->hasMany(inputBarang::class);
    }
}