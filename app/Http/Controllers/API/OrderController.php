<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\OrderService;

class OrderController extends Controller
{
    public function store(Request $request){
        $body = $request->json()->all();
        if ( !(new OrderService())->isValid($body) ){
            return response('Bad request', 400);
        }
        
        $new_order = Order::create([
            'customer_id' => $body['customer_id'],
            'total' => $body['total'],
            'voucher_id'=> $body['voucher_id'],
            'address' => $body['address'],
        ]);
        foreach($body['order_items'] as $orderItem){
            OrderItem::create([
                'order_id' => $new_order->id,
                'menu_id' => $orderItem['menu_id'],
                'quantity' => $orderItem['quantity'],
            ]);
        }
        return response('OK', 200);

        // var_dump($request->json()->all());
    }
}
