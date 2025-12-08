<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Yacht extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'ownership',
        'shares_committed',
        'brand',
        'brand_logo',
        'status',
        'show',
        'length_overall',
        'beam',
        'height',
        'draft',
        'loaded_displacement',
        'cruising_speed',
        'max_speed',
        'main_engine',
        'range',
        'stabilizer',
        'hull_material',
        'hull_structure',
        'generator',
        'solar_panels',
        'maximum_passengers',
        'cabins',
        'berths',
        'heads',
        'fuel_capacity',
        'freshwater_capacity',
        'holding_tank',
        'equipment',
        'certifications',
        'details',
        'brochure_url',
        'main_image',
        'gallery_images'
    ];

    protected $casts = [
        'details' => 'array',
        'gallery_images' => 'array',
        'price' => 'decimal:2',
    ];

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}
