<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;


class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galeries';
    protected $guarded = ['id'];

//     public function kategori()
// {
//     return $this->belongsTo(Category::class);
// }

// public function user()
// {
//     return $this->belongsTo(User::class);
// }
}
