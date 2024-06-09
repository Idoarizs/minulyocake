<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'harga', 'gambar'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
