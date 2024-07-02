<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'title',
        'image',
        'author',
        'slug',
        'body',
        'user_id',
        'date_article',
        'timestamp'
    ];

    protected $casts = [
        'date_article' => 'datetime:Y-m-d',
    ];
}
