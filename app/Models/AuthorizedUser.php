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
        'referral_code',
        'referred_users',
        'is_used',
        'used_at',
        'user_id',
    ];

    protected $casts = [
        'is_used' => 'boolean',
        'used_at' => 'datetime',
        'referred_users' => 'array',
    ];

    /**
     * Generate a unique access code with SKT prefix
     */
    public static function generateAccessCode(): string
    {
        do {
            $code = 'SKT' . strtoupper(Str::random(6));
        } while (self::where('access_code', $code)->exists());

        return $code;
    }

    /**
     * Generate a unique referral code
     */
    public static function generateReferralCode(): string
    {
        do {
            $code = 'SKTREF' . strtoupper(Str::random(5));
        } while (self::where('referral_code', $code)->exists());

        return $code;
    }

    /**
     * Check if referral code can accept more users
     */
    public function canAcceptReferral(): bool
    {
        $referredUsers = $this->referred_users ?? [];
        return count($referredUsers) < 5;
    }

    /**
     * Add a referred user to the array
     */
    public function addReferredUser(string $email): void
    {
        $referredUsers = $this->referred_users ?? [];
        
        if (count($referredUsers) < 5 && !in_array($email, $referredUsers)) {
            $referredUsers[] = $email;
            $this->update(['referred_users' => $referredUsers]);
        }
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
