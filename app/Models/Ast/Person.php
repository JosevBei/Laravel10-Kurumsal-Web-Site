<?php

namespace App\Models\Ast;

use Illuminate\Database\Eloquent\Model;
use App\Enums\PersonType;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    protected $fillable = ['name', 'type', 'odeme'];

    public function excelData(): HasMany
    {
        return $this->hasMany(ExcelData::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'people_id')->orderBy('payment_date', 'asc');
    }
}