<?php

namespace App\Models\Ast;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductType extends Model
{
    protected $fillable = ['name', 'price', 'stock'];
    public function excelData(): HasMany
    {
        return $this->hasMany(ExcelData::class);
    }
}