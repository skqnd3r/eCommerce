<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'products_id',
        'types_id',
        'quantity',
    ];

    // public function product()
    // {
    //     return $this->hasMany(Product::class);
    // }

    // public function type()
    // {
    //     return $this->hasMany(Type::class);
    // }

    // public function cart()
    // {
    //     return $this->belongsToMany(Cart::class);
    // }
}
