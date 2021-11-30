<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MessengerService;
use App\Models\{Customer,Voucher};

class CustomerController extends Controller
{
    public function create(Request $request){
        $psid = $request->query('psid');
        return view('customer.register',compact('psid'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'phoneNumber' => 'required',
            'psid' => 'required'
        ]);
        Customer::updateOrCreate([
            'phoneNumber' => $request['phoneNumber'],
        ],[
            'psid' => $request['psid'],
            'name' => $request['name'],
        ]);

        //Send message to new customer
        (new MessengerService())->sendFirstTimeRegisterVoucher($request['psid']);
        
        return redirect()->back()->with('message','Success! You have registered membership');

    }
}
