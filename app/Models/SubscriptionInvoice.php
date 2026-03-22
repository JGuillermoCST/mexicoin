<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubscriptionInvoice extends Model
{
    protected $fillable = [
        'user_id',
        'subscription_id',
        'stripe_invoice_id',
        'stripe_payment_intent_id',
        'stripe_charge_id',
        'plan',
        'amount',
        'currency',
        'status',
        'period_start',
        'period_end',
        'paid_at',
        'invoice_pdf_url',
    ];

    protected $casts = [
        'period_start' => 'datetime',
        'period_end'   => 'datetime',
        'paid_at'      => 'datetime',
        'amount'       => 'decimal:2',
    ];

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}