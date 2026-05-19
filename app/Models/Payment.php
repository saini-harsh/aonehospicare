<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'payment_id',
        'razorpay_order_id',
        'payment_method',
        'amount',
        'currency',
        'status',
        'raw_response'
    ];

    protected $casts = [
        'raw_response' => 'array'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
