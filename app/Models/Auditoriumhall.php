<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoriumhall extends Model
{
    use HasFactory;
    protected $fillable=['auditorium_id','auditorium_hall_name'];
}
