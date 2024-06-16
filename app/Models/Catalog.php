<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'seller',
        'harga',
        'deskripsi',
        'wa',
        'ig',
        'image'
    ];

}
