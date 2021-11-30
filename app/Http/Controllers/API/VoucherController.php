<?php

namespace App\Http\Controllers\API;

use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Voucher as VoucherResource;

class VoucherController extends Controller
{
    public function index(){
        // return MenuResource::collection(Menu::all());
    }
    public function show($voucher_code){
        $voucher = Voucher::where('voucher_id',$voucher_code)->first();
        if(!$voucher) return response('Bad request',400);
        return new VoucherResource($voucher);
    }
}
