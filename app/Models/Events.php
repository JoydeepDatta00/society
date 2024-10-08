<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_name',
        'event_description',
        'event_date',
        'event_thumbnail_image',
        'event_video_link',
    ];

}
