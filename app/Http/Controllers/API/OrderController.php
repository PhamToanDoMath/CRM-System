<?php

namespace App\Http\Controllers\API;

use App\Models\{Order, OrderItem, Customer};
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

        $customer = Customer::where('phoneNumber',$body['phoneNumber'])->first();
        if(!$customer){
            $customer = Customer::create([
                'name' => $body['name'] ?? NULL,
                'phoneNumber' => $body['phoneNumber'],
                'address' => $body['address'],
            ]);
        }
        $customer->update([
            'last_purchased_date' => now()
        ]);

        $new_order = Order::create([
            'customer_id' => $customer->id,
            'total' => $body['total'],
            'voucher_id'=> $body['voucher_id'],
            'address' => $body['address'],
            'payment_method' => $body['payment_method'],
        ]);
        foreach($body['order_items'] as $orderItem){
            OrderItem::create([
                'order_id' => $new_order->id,
                'menu_id' => $orderItem['menu_id'],
                'quantity' => $orderItem['quantity'],
            ]);
        }

        $array = [
            'message' => 'OK',
            'order_id' => $new_order->id,
        ];
        return response(json_encode($array), 200);

        // var_dump($request->json()->all());
    }
}
