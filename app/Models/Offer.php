<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'project_details', 'estimated_price'];

    // Offer modeli içinde
    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }
}