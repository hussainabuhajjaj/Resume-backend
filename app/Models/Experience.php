<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company_name',
        'company_website',
        'location',
        'start_date',
        'end_date',
        'is_current',
        'short_description',
        'order',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
    ];

    public function descriptionPoints(): HasMany
{
    return $this->hasMany(ExperienceDescriptionPoint::class)->orderBy('order');
}
}