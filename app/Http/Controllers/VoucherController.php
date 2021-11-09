<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends Controller
{
    public function index(){
        $vouchers = Voucher::all();
        return view('admin.vouchers.index', compact('vouchers'));
    }
}
