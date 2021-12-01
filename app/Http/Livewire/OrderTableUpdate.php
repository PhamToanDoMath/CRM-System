<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Menu;
use Livewire\Component;
use App\Services\VoucherService;
use Illuminate\Support\Facades\Log;
use App\Exceptions\VoucherException;
use App\Models\{Order,OrderItem,Customer};

class OrderTableUpdate extends Component
{
    public $menu_id, $quantity;
    public $name = NULL, $address, $phoneNumber;
    public $voucher_id, $payment_method;
    public $order_id;
    public $total;
    public $count_items;
    public $inputs = [];
    public $i = 0;
    public $order_items;
    protected $rules = [
        'phoneNumber' => 'required',
        'address' => 'required',
        'payment_method' => 'required',
        'menu_id.0' => 'required',
        'quantity.0' => 'required',
        'menu_id.*' => 'required',
        'quantity.*' => 'required',
    ];

    protected $messages = [
        'menu_id.0.required' => 'Menu ID is required',
        'quantity.0.required' => 'Quantity is required',
        'menu_id.*.required' => 'Menu ID id required',
        'quantity.*.required' => 'Menu ID is required',
    ];

    public function mount(){
        $this->order_items = OrderItem::where('order_id',$this->order_id)->get();
        // mount data on order items rows
        $this->menu_id[0] = $this->order_items[0]->menu_id;
        $this->quantity[0] = $this->order_items[0]->quantity;  
        for($iter=1 ; $iter < $this->count_items; $iter++){
            $this->add($this->i);
            $this->menu_id[$iter] = $this->order_items[$iter]->menu_id;
            $this->quantity[$iter] = $this->order_items[$iter]->quantity;  
        }
        // dd($this->menu_id);  
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    // private function resetInputFields(){
    //     $this->menu_id = '';
    //     $this->quantity = '';
    // }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store()
    {
        $validatedData = $this->validate();

        $customer = Customer::where('phoneNumber',$this->phoneNumber)->first();
        if(!$customer){
            $customer = Customer::create([
                'name' => $request['name'] ?? NULL,
                'phoneNumber' => $this->phoneNumber,
                'address' => $this->address,
            ]);
        }

        ///Validate item order
        $total = 0;
        foreach($this->menu_id as $key => $value){
            if($this->menu_id[$key] && $this->quantity[$key]){
                $menu = Menu::where('id',$this->menu_id[$key])->first();
                $orderItem = $this->order_items->where('menu_id',$this->menu_id[$key])->first();
                try{
                    if(!$menu) 
                        throw new Exception('Invalid item');

                    // The item is always available when the order is made
                    // if(!$menu->is_available) 
                    //     throw new Exception('Item is not available at the moment!');
                    
                    if($this->quantity[$key] > $menu->quantity + $orderItem->quantity){ 
                        
                        throw new Exception('Ordering quantity is more than we had');
                    }
                    $total += $this->quantity[$key] * $menu->price;
                }
                catch(Exception $e){
                    return redirect()->back()->with('errors', $e->getMessage());
                };
            }
        }

        // Calculate total after voucher deduction
        if ($this->voucher_id){

            //Handle exception when making a voucher transaction 
            try{
                $total = (new VoucherService())->getTotalAfterApplyVoucher($this->voucher_id,$total);
            }catch(VoucherException $error){
                return redirect()->back()->with('errors', $error->getMessage()); 
            }
        }

        ///Calculate total
        foreach($this->menu_id as $key => $value){
            if($this->menu_id[$key] && $this->quantity[$key]){
                $menu = Menu::where('id',$this->menu_id[$key])->first();
                $previous_quantity = $this->order_items->where('menu_id',$this->menu_id[$key])->first()->quantity;
                
                //decrease quantity on menu item
                $menu->quantity -= $this->quantity[$key] - $previous_quantity;
                if ($menu->quantity == 0 ) $menu->is_available = 0;
                $menu->save();
            }
        }

        //Create order and order items
        $order = Order::find($this->order_id);
        $order->update([
            'customer_id' => $customer->id,
            'total' => $total,
            'address' => $this->address,
            'voucher_id' => $this->voucher_id ?? NULL,
            'payment_method' => $this->payment_method,
        ]);

        OrderItem::where('order_id',$this->order_id)->delete();
        foreach ($this->menu_id as $key => $value) {
            OrderItem::create([
                'menu_id' => $this->menu_id[$key],
                'quantity' => $this->quantity[$key],
                'order_id' => $order->id,
            ]);
        }
  
        $this->inputs = [];

        return redirect()->route('admin.orders.index')->with('message', 'Success! Order Has Been Modified');
    }


    public function render()
    {
        return view('livewire.order-table-update');
    }
}
