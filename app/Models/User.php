<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Wishlist;
#[Fillable([
    'name',
    'phone',
    'email',
    'password',
    'city_id',
    'status'
])]
#[Hidden([
    'password',
    'remember_token'
])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductPreview::class);
    }


    public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => 'boolean',
        ];
    }
}
