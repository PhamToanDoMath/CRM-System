<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Handlers\SenderHandler;
use App\Services\MessengerService;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::latest()->paginate(10);
        return view('admin.users.index',compact('customers'));
    }

    // public function create(Request $request){
    //     $psid = $request->query('psid');
    //     return view('customer.register',compact('psid'));
    // }

    // public function store(Request $request){
    //     $request->validate([
    //         'name' => 'required',
    //         'phoneNumber' => 'required',
    //         'psid' => 'required'
    //     ]);
    //     Customer::updateOrCreate([
    //         'phoneNumber' => $request['phoneNumber'],
    //     ],[
    //         'psid' => $request['psid'],
    //         'name' => $request['name'],
    //     ]);

    //     //Send message to new customer
    //     (new MessengerService())->sendFirstTimeRegisterVoucher($request['psid']);
        
    //     return redirect()->back()->with('message','Success! You have registered membership');

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
        $customer = Customer::create($request->validate([
            'name'=> 'required',
            'address' => 'required',
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
        return view('admin.users.edit', compact('customer'))->with('customer',$customer);
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
            'phoneNumber' => 'required',
            'address' => 'required',
        ]));

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
        //
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('admin.customers.index');
    }
}
