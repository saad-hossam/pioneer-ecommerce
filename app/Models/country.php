<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
        protected $guarded = [];


    public function governorates()
    {
        return $this->hasMany(Governorate::class);
    }
}
