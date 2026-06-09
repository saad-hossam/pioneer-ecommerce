<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class City extends Model
{

    protected $guarded = [];

    public $timestamps = false;

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
