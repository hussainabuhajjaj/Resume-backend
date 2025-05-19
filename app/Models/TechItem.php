<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TechItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'tech_category_id',
        'name',
        'icon_url_or_svg',
        'proficiency_level',
        'order',
    ];

    public function techCategory(): BelongsTo
    {
        return $this->belongsTo(TechCategory::class);
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_technologies');
    }
}