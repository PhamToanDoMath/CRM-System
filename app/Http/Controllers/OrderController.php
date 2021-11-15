<?php

namespace App\Http\Controllers;

use App\Models\{Order, OrderItem, Customer, Menu};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\OrderService;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);
        foreach($orders as $order){
            // $customer = Customer::find($order->customer_id);
            $order->phoneNumber = Customer::find($order->customer_id)->phoneNumber;
        }
        return view('admin.orders.index', compact('orders'));
    }

    public function indexAsClerk(){
        $orders = Order::where('order_status',0)->get();
        return view('clerk.orders.index', compact('orders'));
    }
    public function indexAsChef(){
        $orders = Order::where('order_status',1)->get();
        return view('chef.orders.index', compact('orders'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Customer::where('phoneNumber',$request['phoneNumber'])->first();
        if(!$customer){
            $customer = Customer::create([
                // 'name' => $body['name'],
                'phoneNumber' => $request['phoneNumber'],
                'address' => $request['address'],
            ]);
        }
        $customer->update([
            'last_purchased_date' => now()
        ]);

        $total = 0;

        foreach($request['order_items'] as $orderItem){
            if($orderItem['menu_id'] && $orderItem['quantity']){
                $menu = Menu::where('id',$orderItem['menu_id'])->first();
                if($menu){
                    $total += $orderItem['quantity'] * $menu->price;
                }
                else{return redirect()->route('admin.orders.index');}
            }
        }

        $new_order = Order::create([
            'customer_id' => $customer->id,
            'total' => $total,
            'voucher_id'=> $request['voucher_id'],
            'address' => $request['address'],
        ]);

        foreach($request['order_items'] as $orderItem){
            if($orderItem['menu_id'] && $orderItem['quantity']){
                OrderItem::create([
                    'order_id' => $new_order->id,
                    'menu_id' => $orderItem['menu_id'],
                    'quantity' => $orderItem['quantity'],
                ]);
            }
        }
        return redirect()->route('admin.orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $order_Items = OrderItem::where('order_id',$order->id)->get();
        return view('admin.orders.edit',compact('order', 'order_Items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        /*
        $customer = Customer::where('id',$order['customer_id'])->first();
        if(!$customer){
            $customer = Customer::create([
                // 'name' => $body['name'],
                'phoneNumber' => $request['phoneNumber'],
                'address' => $request['address'],
            ]);
        }
        $customer->update([
            'last_purchased_date' => now()
        ]);
        */

        $total = 0;

        foreach($request['order_items'] as $orderItem){
            if($orderItem['menu_id'] && $orderItem['quantity']){
                $menu = Menu::where('id',$orderItem['menu_id'])->first();
                $total += $orderItem['quantity'] * $menu->price;
            }
        }
        /*
        $order->update([
            'total' => $total,
            'voucher_id'=> $request['voucher_id'],
        ]);
        */

        $order_Items = OrderItem::where('order_id',$order->id)->get();
        foreach($order_Items as $orderItem){
            $orderItem->delete();
        }
        
        foreach($request['order_items'] as $orderItem){
            if($orderItem['menu_id'] && $orderItem['quantity']){
                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_id' => $orderItem['menu_id'],
                    'quantity' => $orderItem['quantity'],
                ]);
            }
        }
        
        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index');
    }

    public function elevateStatus($id){
        $order = Order::find($id);
        if ($order->order_status < 2) $order->order_status++;
        $order->save();
        return redirect()->back();
    }

    public function confirmAsClerk($id){
        $order = Order::find($id);
        if ($order->order_status == 0) $order->order_status++;
        $order->save();
        return redirect()->route('clerk.orders.index');
    }

    public function confirmAsChef($id){
        $order = Order::find($id);
        if ($order->order_status == 1) $order->order_status++;
        $order->save();
        return redirect()->route('chef.orders.index');
    }
}
