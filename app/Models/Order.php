<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'hospital_address',
        'city',
        'state',
        'pincode',
        'coupon_code',
        'discount_amount',
        'subtotal',
        'gst_amount',
        'total_amount',
        'payment_method',
        'payment_status',
        'order_status',
        'awb_code',
        'notes'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
