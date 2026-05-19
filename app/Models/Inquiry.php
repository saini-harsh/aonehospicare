<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'form_type',
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'additional_data',
        'status'
    ];

    protected $casts = [
        'additional_data' => 'array'
    ];
}
