<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Property extends Model
{
    protected $fillable = [
        'title',
        'slug',
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
        'main_image',
        'amenities',
        'status',
        'expected_rental_yield',
        'is_featured',
        'location_id'
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

    /**
     * Get the route key for implicit model binding.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function propertyShares(): HasMany
    {
        return $this->hasMany(PropertyShare::class);
    }

    /**
     * Relationship: Location
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Users yang like property ini
     */
    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'property_likes')
                    ->withTimestamps();
    }

    /**
     * Check apakah property ini dilike oleh user tertentu
     */
    public function isLikedBy($userId)
    {
        return $this->likedByUsers()->where('user_id', $userId)->exists();
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
