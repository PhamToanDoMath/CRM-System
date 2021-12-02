<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MessengerService;
use Illuminate\Support\Facades\Log;
use App\Exceptions\VoucherException;
use App\Http\Controllers\Controller;
use App\Services\{OrderService,VoucherService};
use App\Models\{Order, OrderItem, Customer, Menu, Voucher};

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('updated_at','DESC')->paginate(10);
        foreach($orders as $order){
            // $customer = Customer::find($order->customer_id);
            $order->phoneNumber = Customer::find($order->customer_id)->phoneNumber;
        }
        return view('admin.orders.index', compact('orders'));
    }

    public function indexAsClerk(){
        $orders = Order::whereIn('order_status',[0,1])
        ->orderBy('updated_at','DESC')
        ->get();
        foreach($orders as $order){
            // $customer = Customer::find($order->customer_id);
            $order->phoneNumber = Customer::find($order->customer_id)->phoneNumber;
        }
        return view('clerk.orders.index', compact('orders'));
    }
    public function indexAsChef(){
        $orders = Order::whereIn('order_status',[1,2])
        ->orderBy('updated_at','DESC')
        ->get();
        foreach($orders as $order){
            // $customer = Customer::find($order->customer_id);
            $order->phoneNumber = Customer::find($order->customer_id)->phoneNumber;
        }
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


    public function createAsClerk()
    {
        return view('clerk.orders.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //
    // }

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
        $orderItems = OrderItem::where('order_id',$order->id)->get();
        $customer = Customer::find($order->customer_id);
        return view('admin.orders.edit',compact('order', 'orderItems','customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Order $order)
    // {
    //     
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        OrderItem::where('order_id', $order->id)->delete();
        $order->delete();
        return redirect()->route('admin.orders.index');
    }

    // 0:created --confirm--  1:confirmed/preparing  --prepare--  2:preparing --complete---  3:completed 
    public function elevateStatus($id){
        $order = Order::find($id);

        if ($order->order_status < 3) $order->order_status++;

        //If order is confirmed
        if ($order->order_status == 1){
            (new MessengerService())->notifyConfirmedOrder($order,Customer::find($order->customer_id)->psid);
        }
        //If order is completed
        if ($order->order_status == 3){
            (new MessengerService())->notifyCompletedOrder($order,Customer::find($order->customer_id)->psid);
        }
        $order->save();
        return redirect()->back();
    }

    public function confirmAsClerk($id){
        $order = Order::find($id);
        if ($order->order_status == 0) $order->order_status++;
        $order->save();

        (new MessengerService())->notifyConfirmedOrder($order,Customer::find($order->customer_id)->psid);

        return redirect()->route('clerk.orders.index');
    }

    public function confirmAsChef($id){
        $order = Order::find($id);
        if ($order->order_status == 1 || $order->order_status == 2 ) $order->order_status++;
        $order->save();

        (new MessengerService())->notifyCompletedOrder($order,Customer::find($order->customer_id)->psid);

        return redirect()->route('chef.orders.index');
    }
}
