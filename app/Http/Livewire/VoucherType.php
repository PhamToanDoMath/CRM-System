<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class VoucherType extends Component
{
    public Model $model;

    public $field;

    public $type;

    public function mount()
    {
        $this->type = $this->model->getAttribute($this->field);
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
    }

    public function render()
    {
        return view('livewire.voucher-type');
    }
}
