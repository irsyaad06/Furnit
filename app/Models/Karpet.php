<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karpet extends Model
{
    use HasFactory;

    protected $table = 'karpet';

    protected $fillable = [

        'nama',
        'bahan',
        'panjang',
        'lebar',
        'harga',
        'stok',
    ];
}

