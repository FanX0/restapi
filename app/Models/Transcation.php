<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transcation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'user_id',
        'gross_amount',
        'shipping_information',
        'merchant_id',
        'payment_method',
        'status_message',
        'transaction_id',
        'transaction_status',
        'transaction_time',
        'settlement_time',
        'expiry_time',
        'fraud_status',
        'order_status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'transaction_time' => 'datetime',
        'settlement_time' => 'datetime',
        'expiry_time' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
