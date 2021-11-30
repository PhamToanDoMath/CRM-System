<?php

namespace App\Models;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'phoneNumber',
        'name',
        'address',
        'last_purchased_date',
        'psid',
    ];

    public function orders(){
        return Order::where('customer_id',$this->id)->get();
    }
}