<?php

namespace App\Models\Ast;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'people_id',
        'payment_date',
        'payment_amount',
    ];

    // Eğer başka ilişkiler veya özellikler eklemek istersen buraya ekleyebilirsin.

    // Örneğin, bu ödeme bir excel_data öğesine ait mi kontrolü için:
    public function excelData()
    {
        return $this->belongsTo(People::class, 'people_id');
    }
}
