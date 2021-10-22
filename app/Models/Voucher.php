<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    public $fillable = [
        'voucher_id',
        'name',
        'type',
        'deduction_amount',
        'start_from',
        'end_at',
        'is_enable',
        'released_voucher',
        'used_voucher',
    ];
}
