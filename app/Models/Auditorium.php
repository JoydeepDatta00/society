<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditorium extends Model
{
    use HasFactory;
    protected $table = 'auditorium';
    protected $fillable = [
        'name',
        'address',
        'description',
        'seating_capacity',
        'auditorium_image'
    ];
}
