<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;
    protected $fillable=[
        'member_name',
        'member_email',
        'member_phone_no',
        'member_designation',
        'member_image',
        'member_description'
    ];
}
