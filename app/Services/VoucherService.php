<?php

namespace App\Services;

use App\Models\{Voucher};
use Exception;
use App\Exceptions\VoucherException;

class VoucherService{

    public function getTotalAfterApplyVoucher($voucher_code, $total){
        $voucher = Voucher::where('voucher_id', $voucher_code)->first();

        if (!$voucher || !$voucher->is_enable)
            throw new VoucherException('Invalid voucher code');   

        if($voucher->deduction_amount > $total && $voucher->type === 'amount'){
            throw new VoucherException('Not enough minimal amount');
        }
        
        if($voucher->used_voucher >= $voucher->released_voucher)
        {
            throw new VoucherException('Exceed the maximum voucher released amount');
        }

        if($voucher->start_from->gt(now()) || $voucher->end_at->lte(now())){
            $voucher->is_enable = 0;
            $voucher->save();
            throw new VoucherException('No longer available voucher');
        }
        
        $voucher->used_voucher++;
        $voucher->save();

        if($voucher->type === 'amount' )
            $total -= $voucher->deduction_amount;
        if($voucher->type === 'percentage')
            $total *= (100-$voucher->deduction_amount);

        return $total;
    }

}