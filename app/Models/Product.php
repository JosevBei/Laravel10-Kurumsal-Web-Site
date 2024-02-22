<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'slug', 'description', 'product_code', 'length', 'width', 'weight', 'image', 'hits'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getSlugAttribute()
    {
        return Str::slug($this->name);
    }

    public function scopePopular($query, $limit = 10)
    {
        return $query->orderBy('hits', 'desc')->limit($limit);
    }

    
    
    
    
}


