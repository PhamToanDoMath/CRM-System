<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;
use App\Services\VoucherService;
use App\Exceptions\VoucherException;
use App\Models\{Order,OrderItem,Customer};

class OrderTable extends Component
{
    public $menu_id, $quantity;
    public $name = NULL, $address, $phoneNumber;
    public $voucher_id, $payment_method;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;
    
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
    private function resetInputFields(){
        $this->menu_id = '';
        $this->quantity = '';
    }
      
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
                'address' => $this->address
            ]);
        }
        $customer->update([
            'last_purchased_date' => now()
        ]);

        ///Validate item order and calculate total
        $total = 0;
        foreach($this->menu_id as $key => $value){
            if($this->menu_id[$key] && $this->quantity[$key]){
                $menu = Menu::where('id',$this->menu_id[$key])->first();
                if($menu){
                    $total += $this->quantity[$key] * $menu->price;
                }
                else{
                    session()->flash('message', 'Wrong Menu ID or quantity');
                    return redirect()->back();
                }
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

        //Create order and order items
        $order = Order::create([
            'customer_id' => $customer->id,
            'total' => $total,
            'address' => $this->address,
            'voucher_id' => $this->voucher_id ?? NULL,
            'payment_method' => $this->payment_method,
        ]);

        foreach ($this->menu_id as $key => $value) {
            OrderItem::create([
                'menu_id' => $this->menu_id[$key],
                'quantity' => $this->quantity[$key],
                'order_id' => $order->id,
            ]);
        }
  
        $this->inputs = [];
   
        $this->resetInputFields();
   
        session()->flash('message', 'Order Has Been Created Successfully.');
        return redirect()->route('admin.orders.index');
    }


    public function render()
    {
        return view('livewire.order-table');
    }
}
