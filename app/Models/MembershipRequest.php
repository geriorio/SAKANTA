<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipRequest extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'country',
        'phone',
        'has_referral',
        'referral_name',
        'status',
    ];

    protected $casts = [
        'has_referral' => 'boolean',
    ];
}
