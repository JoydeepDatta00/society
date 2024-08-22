<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventsgallery extends Model
{
    use HasFactory;
    protected $fillable=[
        'events_gallery_image',
        'event_id'
    ];
}
