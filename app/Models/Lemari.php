<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lemari extends Model
{
    use HasFactory;

    protected $table = 'lemari';

    protected $fillable = [

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