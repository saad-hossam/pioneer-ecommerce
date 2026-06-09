<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    public $timestamps = false;
        protected $guarded = [];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function shippingGovernorate()
    {
        return $this->hasOne(ShippingGovernorate::class);
    }
}
