<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'phone',
        'email',
        'about',
        'cv_url',
        'avatar_image_url',
        'hero_background_image_url',
    ];
    protected $casts = [
        'avatar_image_url' => 'array',
    ];
}