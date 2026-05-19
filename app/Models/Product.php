<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'title', 'slug', 'image', 'gallery', 'features', 'code', 'hsn_code', 'price', 'gst_percentage', 'is_latest', 'is_bestseller', 'meta_title', 'meta_description', 'meta_keywords'
    ];

    protected $casts = [
        'gallery' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTotalPriceAttribute()
    {
        return $this->price + ($this->price * $this->gst_percentage / 100);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class)->where('status', true);
    }
}
