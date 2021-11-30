<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Voucher extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'voucher_id' => $this->voucher_id,
            'name' => $this->name,
            'deduction_amount' => $this->deduction_amount,
            'type' => $this->type,
            'start_from' => $this->start_from,
            'end_at' => $this->end_at,
            'is_enable' => $this->is_available,
            'released_voucher' => $this->released_voucher,
            'used_voucher' =>$this->used_voucher,
        ];
    }

}
