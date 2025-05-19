<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TechCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order',
    ];

    public function techItems(): HasMany // Renamed from 'items' for clarity
    {
        return $this->hasMany(TechItem::class);
    }
}