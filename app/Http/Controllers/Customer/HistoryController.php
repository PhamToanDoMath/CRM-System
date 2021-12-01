<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public function index()
    {
        return view('customer.history.index');
    }

}
