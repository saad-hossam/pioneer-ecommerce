<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
        protected $guarded = [];

    protected $casts = [
        'permission' => 'array'
    ];

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }
}
