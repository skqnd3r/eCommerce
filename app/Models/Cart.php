<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'users_id',
        'stocks_id'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
