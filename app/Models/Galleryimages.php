<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galleryimages extends Model
{
    use HasFactory;
    protected $fillable=['name',
    'thumbnail_id',
    'gallery_image'
];
}
