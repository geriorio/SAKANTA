<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YachtLike extends Model
{
    protected $fillable = [
        'user_id',
        'yacht_id',
    ];

    /**
     * Get user yang like yacht ini
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get yacht yang dilike
     */
    public function yacht()
    {
        return $this->belongsTo(Yacht::class);
    }
}
