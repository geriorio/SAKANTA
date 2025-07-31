<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyShare extends Model
{
    protected $fillable = [
        'property_id',
        'user_id',
        'shares_owned',
        'purchase_price',
        'purchased_at',
        'status'
    ];

    protected $casts = [
        'purchase_price' => 'decimal:2',
        'purchased_at' => 'datetime'
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getTotalInvestmentAttribute()
    {
        return $this->shares_owned * $this->purchase_price;
    }

    public function getFormattedTotalInvestmentAttribute()
    {
        return 'Rp ' . number_format($this->total_investment, 0, ',', '.');
    }
}
