<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyLike extends Model
{
    protected $fillable = [
        'user_id',
        'property_id',
    ];

    /**
     * Get user yang like property ini
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get property yang dilike
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
