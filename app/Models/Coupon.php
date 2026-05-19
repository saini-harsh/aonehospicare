<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'name',
        'code',
        'value',
        'expiry_date',
        'limit',
        'used',
        'status',
    ];
}
