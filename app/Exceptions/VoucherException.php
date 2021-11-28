<?php

namespace App\Exceptions;

use Exception;

class VoucherException extends Exception
{
    public function report()
    {
        // Log::debud('Voucher not found');
    }

    // public function render($request)
    // {
    //     return redirect()->back();
    // }
}
