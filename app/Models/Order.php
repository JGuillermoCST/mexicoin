<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'address', 'payment_method', 'status', 'proof_image', 'total'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}