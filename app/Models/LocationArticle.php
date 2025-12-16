<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'section1_title',
        'section1_image',
        'section1_desc',
        'section2_subtitle',
        'section2_paragraphs',
        'section3_punchline',
        'section4_points',
    ];

    protected $casts = [
        'section2_paragraphs' => 'array',
        'section4_points' => 'array',
    ];

    // Relationship with Location
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}