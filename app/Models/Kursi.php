<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursi extends Model
{
    use HasFactory;

    protected $table = 'kursi';

    protected $fillable = [

        'gambar',
        'nama',
        'jenis',
        'bahan',
        'warna',
        'panjang',
        'lebar',
        'tinggi',
        'harga',
        'stok',
    ];
}
