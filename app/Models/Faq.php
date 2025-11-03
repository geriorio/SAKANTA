<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'hero_small_title',
        'hero_big_title',
        'icon',
    ];

    public function questions()
    {
        return $this->hasMany(FaqQuestion::class)->orderBy('order');
    }
}
