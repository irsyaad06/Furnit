<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aksesoris extends Model
{
    use HasFactory;

    protected $table = 'aksesoris';

    protected $fillable = [

        'nama',
        'jenis',
        'bahan',
        'warna',
        'harga',
        'stok',
        
    ];
}
