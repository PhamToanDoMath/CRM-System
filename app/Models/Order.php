<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
        public $fillable = [
            'total',
            'voucher_id', 
            'address', 
            'customer_id' 
        ];

        public function orderItems(){
            return $this->hasMany(\App\Models\OrderItem::class);
        }
}
