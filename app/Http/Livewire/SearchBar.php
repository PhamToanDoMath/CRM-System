<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;

class SearchBar extends Component
{
    public $searchInput;
    public $customers;

    public function mount(){
        $this->customers = Customer::all();
    }

    public function render()
    {
        $this->customers= Customer::where('name','LIKE',"%{$this->searchInput}%")
        ->orWhere('phoneNumber', 'LIKE', "%{$this->searchInput}%")->get();
        return view('livewire.search-bar');
    }


}
