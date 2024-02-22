<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'subject', 'message'];

    // ContactMessage modeli içinde
    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }
}