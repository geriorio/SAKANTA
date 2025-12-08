<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AuthorizedUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'access_code',
        'is_used',
        'used_at',
        'user_id',
    ];

    protected $casts = [
        'is_used' => 'boolean',
        'used_at' => 'datetime',
    ];

    /**
     * Generate a unique access code
     */
    public static function generateAccessCode(): string
    {
        do {
            $code = strtoupper(Str::random(3) . '-' . Str::random(3) . '-' . Str::random(3));
        } while (self::where('access_code', $code)->exists());

        return $code;
    }

    /**
     * Relationship with User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mark access code as used
     */
    public function markAsUsed(User $user)
    {
        $this->update([
            'is_used' => true,
            'used_at' => now(),
            'user_id' => $user->id,
        ]);
    }
}
