<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Support\Str;

    class Category extends Model
    {
        protected $fillable = ['name', 'slug'];

        public function products()
        {
            return $this->hasMany(Product::class);
        }
    
        public function getSlugAttribute()
        {
            return Str::slug($this->name);
        }
    }

