<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class,'parent');
    }

    public function children()
    {
        return $this->hasMany(Category::class,'parent');
    }
}
