<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution_name',
        'degree_or_certificate',
        'field_of_study',
        'start_date',
        'end_date',
        'grade_or_score',
        'description',
        'order',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}