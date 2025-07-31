<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    protected $fillable = [
        'title',
        'description', 
        'address',
        'city',
        'province',
        'price',
        'total_shares',
        'available_shares',
        'price_per_share',
        'property_type',
        'bedrooms',
        'bathrooms',
        'land_area',
        'building_area',
        'images',
        'amenities',
        'status',
        'expected_rental_yield',
        'is_featured'
    ];

    protected $casts = [
        'images' => 'array',
        'amenities' => 'array',
        'price' => 'decimal:2',
        'price_per_share' => 'decimal:2',
        'land_area' => 'decimal:2',
        'building_area' => 'decimal:2',
        'expected_rental_yield' => 'decimal:2',
        'is_featured' => 'boolean'
    ];

    public function propertyShares(): HasMany
    {
        return $this->hasMany(PropertyShare::class);
    }

    public function getMainImageAttribute()
    {
        return isset($this->images[0]) ? $this->images[0] : '/images/default-property.jpg';
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getFormattedPricePerShareAttribute()
    {
        return 'Rp ' . number_format($this->price_per_share, 0, ',', '.');
    }
}
