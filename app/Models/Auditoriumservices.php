<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoriumservices extends Model
{
    use HasFactory;
    protected $fillable=[
        'services_name',
        'auditorium_id',
        'service_cost',
        'service_note',
    ];
}
