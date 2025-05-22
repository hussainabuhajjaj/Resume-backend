<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'author',
        'role',
        'content',
        'active',
    ];
    protected $casts = [
        'active' => 'boolean',
    ];
    protected $table = 'testimonials';
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
    public function getActiveAttribute($value)
    {
        return (bool) $value;
    }
    public function setActiveAttribute($value)
    {
        $this->attributes['active'] = (bool) $value;
    }
    public function getContentAttribute($value)
    {
        return nl2br(e($value));
    }
    public function setContentAttribute($value)
    {
        $this->attributes['content'] = $value;
    }
    public function getAuthorAttribute($value)
    {
        return e($value);
    }
    public function setAuthorAttribute($value)
    {
        $this->attributes['author'] = $value;
    }
    public function getRoleAttribute($value)
    {
        return e($value);
    }
    public function setRoleAttribute($value)
    {
        $this->attributes['role'] = $value;
    }
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }


}

