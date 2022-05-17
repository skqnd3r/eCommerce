<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',     
        'price',
        'description',
        'quantity',
        'alt',
        'img'
];

    public function type()
    {
        return $this->hasMany(Type::class);
    }
}

