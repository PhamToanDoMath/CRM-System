<?php

namespace App\Http\Controllers;

use Casperlaitw\LaravelFbMessenger\Contracts\DefaultHandler;
use Illuminate\Http\Request;

class BotController extends Controller
{
    public function handler(Request $request){
        (new DefaultHandler())->handle($request);
    }
}
