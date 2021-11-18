<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'phoneNumber' => 'required',
    //         'address' => 'required',
    //         'payment_method' => 'required'
    //     ]);

    //     $customer = Customer::where('phoneNumber',$request['phoneNumber'])->first();
    //     if(!$customer){
    //         $customer = Customer::create([
    //             'name' => $request['name'] ?? NULL,
    //             'phoneNumber' => $request['phoneNumber'],
    //             'address' => $request['address'],
    //         ]);
    //     }
    //     $customer->update([
    //         'last_purchased_date' => now()
    //     ]);

    //     $total = 0;

    //     foreach($request['order_items'] as $orderItem){
    //         if($orderItem['menu_id'] && $orderItem['quantity']){
    //             $menu = Menu::where('id',$orderItem['menu_id'])->first();
    //             if($menu){
    //                 $total += $orderItem['quantity'] * $menu->price;
    //             }
    //             else{return redirect()->route('admin.orders.index');}
    //         }
    //     }

    //     if ($request['voucher_id']){

    //         //Handle exception when making a voucher transaction 
    //         try{
    //             $total = (new VoucherService())->getTotalAfterApplyVoucher($request['voucher_id'],$total);
    //         }catch(VoucherException $error){
    //             return redirect()->back()->withErrors(['token' => $error->getMessage()]); 
    //         }
    //     }
        
    //     // dd($request);
    //     $new_order = Order::create([
    //         'customer_id' => $customer->id,
    //         'total' => $total,
    //         'payment_method' => $request['payment_method'],
    //         'voucher_id'=> $request['voucher_id'] ?? NULL,
    //         'address' => $request['address'],
            
    //     ]);

    //     foreach($request['order_items'] as $orderItem){
    //         if($orderItem['menu_id'] && $orderItem['quantity']){
    //             OrderItem::create([
    //                 'order_id' => $new_order->id,
    //                 'menu_id' => $orderItem['menu_id'],
    //                 'quantity' => $orderItem['quantity'],
    //             ]);
    //         }
    //     }
    //     return redirect()->route('admin.orders.index')->with('message', 'success');
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
    //     $request->validate([
    //         'phoneNumber' => 'required',
    //         'address' => 'required',
    //         'payment_method' => 'required'
    //     ]);

    //     $customer = Customer::where('phoneNumber',$request['phoneNumber'])->first();
    //     if(!$customer){
    //         $customer = Customer::create([
    //             'name' => $request['name'] ?? NULL,
    //             'phoneNumber' => $request['phoneNumber'],
    //             'address' => $request['address'],
    //         ]);
    //     }

    //     $total = 0;
    //     foreach($request['order_items'] as $orderItem){
    //         if($orderItem['menu_id'] && $orderItem['quantity']){
    //             $menu = Menu::where('id',$orderItem['menu_id'])->first();
    //             $total += $orderItem['quantity'] * $menu->price;
    //         }
    //     }

    //     if ($request['voucher_id']){

    //         //Handle exception when making a voucher transaction 
    //         try{
    //             $total = (new VoucherService())->getTotalAfterApplyVoucher($request['voucher_id'],$total);
    //         }catch(VoucherException $error){
    //             return redirect()->back()->withErrors(['token' => $error->getMessage()]); 
    //         }
    //     }
        
    //     $order->update([
    //         'total' => $total,
    //         'voucher_id'=> $request['voucher_id'] ?? NULL,
    //         'payment_method' => $request['payment_method']
    //     ]);
        

    //     $order_Items = OrderItem::where('order_id',$order->id)->get();
    //     foreach($order_Items as $orderItem){
    //         $orderItem->delete();
    //     }
        
    //     foreach($request['order_items'] as $orderItem){
    //         if($orderItem['menu_id'] && $orderItem['quantity']){
    //             OrderItem::create([
    //                 'order_id' => $order->id,
    //                 'menu_id' => $orderItem['menu_id'],
    //                 'quantity' => $orderItem['quantity'],
    //             ]);
    //         }
    //     }
        
    //     return redirect()->route('admin.orders.index');
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
