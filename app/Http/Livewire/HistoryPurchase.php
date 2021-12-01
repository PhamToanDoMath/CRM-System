<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Customer;

class HistoryPurchase extends Component
{
    public $historyPurchase;
    public $phoneNumber;

    public function mount(){
        $this->historyPurchase = [];
    }
    public function render()
    {
        return view('livewire.history-purchase',['historyPurchase' => $this->historyPurchase]);
    }

    public function returnResult(){
        if($this->phoneNumber){
            $customer = Customer::where('phoneNumber',$this->phoneNumber)->first();
            if($customer){
                $this->historyPurchase = Order::where('customer_id',$customer->id)->get();
            }
                
        }
            
    }
}
