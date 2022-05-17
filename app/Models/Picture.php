<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'products_id',
        'small',
        'big',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
