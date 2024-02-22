<?php

namespace App\Models\Ast;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ast\Person;
use App\Models\Ast\ProductType;

class ExcelData extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'product_type_id',
        'date',
        'quantity',
        'amount',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    // ExcelData modeli içinde
    public function payments()
    {
        return $this->hasMany(Payment::class, 'people_id');
    }


}
