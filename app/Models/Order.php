<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'user_id',
        'product_title',
        'quantity',
        'price',
        'image',
        'product_id',
        'payment_status',
        'delivery_status'
    ];
}
