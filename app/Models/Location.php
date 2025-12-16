<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image'
    ];

    /**
     * Get the route key for implicit route model binding
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Properties di lokasi ini
     */
    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    /**
     * Article untuk lokasi ini
     */
    public function article()
    {
        return $this->hasOne(LocationArticle::class);
    }
}
