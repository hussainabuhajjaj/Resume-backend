<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image_url',
        'project_url',
        'repo_url',
        'start_date',
        'end_date',
        'is_featured',
        'order',
        'icon'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_featured' => 'boolean',
        'image_url'=>'array'
    ];

    public function technologies(): BelongsToMany
    {
        // Using the explicit pivot model ProjectTechnology
        return $this->belongsToMany(TechItem::class, 'project_technologies')
                    ->using(ProjectTechnology::class) // Specify the pivot model
                    ->withTimestamps(); // If you want to manage timestamps on the pivot
    }
}