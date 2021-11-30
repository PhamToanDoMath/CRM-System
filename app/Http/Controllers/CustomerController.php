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
