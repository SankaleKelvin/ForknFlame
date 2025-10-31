<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_code',
        'user_id',
        'food_id',
        'quantity',
        'order_amount',
        'status',
    ];
}
