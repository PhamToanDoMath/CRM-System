<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::latest()->paginate(10);
        return view('admin.customers.index',compact('customers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Customer::create($request->validate([
            'name'=> 'required',
            'phoneNumber' => 'required|unique:customers',
        ]));
        return redirect()->route('admin.customers.index');
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
    public function edit(Customer $customer)
    {
        //
        return view('admin.customers.edit', compact('customer'))->with('customer',$customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $customer = Customer::find($id);
        $customer->update($request->validate([
            'name'=> 'required',
            'phoneNumber' => 'required|unique:customers,phoneNumber,' . $customer->id,
        ]));
        $customer->update(['address' => $request['address']]);


        return redirect()->route('admin.customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd(Order::where('customer_id',$id)->get()->isEmpty());
        if(!Order::where('customer_id',$id)->get()->isEmpty()){
            return redirect()->route('admin.customers.index')
            ->withErrors("Can't delete the user if there still orders that belong to user");
        }
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('admin.customers.index');
    }

}
