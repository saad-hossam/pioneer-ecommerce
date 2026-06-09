<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductPreview::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'product_tags'
        );
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
