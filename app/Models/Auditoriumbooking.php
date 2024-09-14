<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoriumbooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'organization_name',
        'date',
        'choose_auditorium',
        'auditorium_hall',
        'choose_slots',
        'services',
        'event_name',
        'event_image',
        'url_for_webcasting',
        'user_id',
    ];
}
