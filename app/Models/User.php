<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'firstname',
        'lastname', 
        'password',
        'admin'
        ];

    public function cart()
    {
        return $this->belongsToMany(Cart::class);
    }
    
    public function password_reset()
    {
        return $this->belongsToMany(Cart::class);
    }
}
