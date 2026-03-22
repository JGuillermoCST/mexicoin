<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class Subscription extends Model
{
    protected $fillable = [
        'user_id',
        'plan',
        'amount',
        'currency',
        'interval',
        'stripe_customer_id',
        'stripe_subscription_id',
        'stripe_price_id',
        'stripe_payment_method_id',
        'stripe_latest_invoice_id',
        'status',
        'trial_ends_at',
        'current_period_start',
        'current_period_end',
        'cancelled_at',
        'ends_at',
        'reward_claimed',
        'reward_claimed_at',
        'stripe_metadata',
    ];

    protected $casts = [
        'trial_ends_at'        => 'datetime',
        'current_period_start' => 'datetime',
        'current_period_end'   => 'datetime',
        'cancelled_at'         => 'datetime',
        'ends_at'              => 'datetime',
        'reward_claimed_at'    => 'datetime',
        'reward_claimed'       => 'boolean',
        'stripe_metadata'      => 'array',
        'amount'               => 'decimal:2',
    ];

    // ── Relaciones ──────────────────────────────────────────────────────────

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(SubscriptionInvoice::class);
    }

    // ── Helpers de estado ───────────────────────────────────────────────────

    public function isActive(): bool
    {
        return in_array($this->status, ['active', 'trialing']);
    }

    public function isCancelled(): bool
    {
        return ! is_null($this->cancelled_at);
    }

    /**
     * El usuario canceló pero todavía tiene acceso hasta ends_at.
     */
    public function isOnGracePeriod(): bool
    {
        return $this->isCancelled()
            && $this->ends_at
            && $this->ends_at->isFuture();
    }

    /**
     * Meses completos desde que se creó la suscripción.
     * Usado para calcular el progreso en el centro de suscripción.
     */
    public function monthsActive(): int
    {
        return (int) $this->created_at->diffInMonths(now());
    }

    /**
     * Verifica si la recompensa de fidelidad ya está disponible.
     * Plus: 6 meses | Pro: 3 meses
     */
    public function rewardAvailable(): bool
    {
        $required = $this->plan === 'pro' ? 3 : 6;
        return $this->monthsActive() >= $required && ! $this->reward_claimed;
    }

    // Alias legible para la fecha del próximo cobro
    public function getNextBillingDateAttribute(): ?Carbon
    {
        return $this->current_period_end;
    }
}