<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_title',
        'site_description',
        'phone_number',
        'logo',
        'favicon',
        'instagram',
        'facebook',
        'twitter',
        'pinterest',
        'whatsapp_number',
        'email_address',
        'address',
        'maintenance_mode',
        'theme_color',
    ];
    
}
