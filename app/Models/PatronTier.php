<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatronTier extends Model
{
    protected $fillable = [
        'name',
        'price',
        'currency',
        'benefits',
        'order',
        'active',
    ];
    protected $casts = [
        'active' => 'boolean',
        'benefits' => 'array',
    ];
    protected $table = 'patron_tiers';
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
    public function getPriceAttribute($value)
    {
        return number_format($value, 2);
    }
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = number_format($value, 2);
    }
    public function getBenefitsAttribute($value)
    {
        return json_decode($value, true);
    }
    public function setBenefitsAttribute($value)
    {
        $this->attributes['benefits'] = json_encode($value);
    }
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = \Carbon\Carbon::parse($value)->format('d/m/Y');
    }
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }
    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = \Carbon\Carbon::parse($value)->format('d/m/Y');
    }
    public function getOrderAttribute($value)
    {
        return (int) $value;
    }
    public function setOrderAttribute($value)
    {
        $this->attributes['order'] = (int) $value;
    }
    public function getCurrencyAttribute($value)
    {
        return strtoupper($value);
    }   

}
