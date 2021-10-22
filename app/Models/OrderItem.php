<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public $fillable = [
        'quantity',
        'order_id',
        'menu_id' 
    ];
}
