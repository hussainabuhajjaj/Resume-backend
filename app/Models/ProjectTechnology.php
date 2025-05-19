<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// Use Illuminate\Database\Eloquent\Relations\Pivot instead of Model for pivot tables
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectTechnology extends Pivot // Change Model to Pivot
{
    use HasFactory; // Optional for pivots, but fine to include

    protected $table = 'project_technologies'; // Explicitly define table name

    // No $fillable needed if you're only using it for relationships and not creating directly.
    // If you add extra columns to the pivot and want to mass-assign them, add them to $fillable.
    // public $incrementing = true; // If you use an 'id' primary key on the pivot

    // Define relationships back to Project and TechItem if you need to access them from the pivot model instance
    // public function project()
    // {
    //     return $this->belongsTo(Project::class);
    // }

    // public function techItem()
    // {
    //     return $this->belongsTo(TechItem::class);
    // }
}