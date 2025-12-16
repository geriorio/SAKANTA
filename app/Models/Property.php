<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Property extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'shares_booked',
        'description', 
        'address',
        'city',
        'province',
        'price',
        'ownership',
        'bedrooms',
        'bathrooms',
        'land_area',
        'building_area',
        'built_in',
        'distance_from_airport',
        'map_embed_url',
        'latitude',
        'longitude',
        'images',
        'main_image',
        'additional_photos',
        'facilities',
        'surroundings',
        'perfect_for',
        'status',
        'location_id'
    ];

    protected $casts = [
        'images' => 'array',
        'additional_photos' => 'array',
        'facilities' => 'array',
        'surroundings' => 'array',
        'price' => 'decimal:2',
        'land_area' => 'decimal:2',
        'building_area' => 'decimal:2'
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
        return 'Rp. ' . number_format($this->price, 0, ',', '.');
    }
}
