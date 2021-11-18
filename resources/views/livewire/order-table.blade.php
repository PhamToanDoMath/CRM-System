<div>
    <form>
        <div class="row justify-content-center">
            @csrf
            <div class="col-md-8">
                @if( $errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group" style="list-style: none">
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(Session::has('errors'))
                <div class="alert alert-danger">
                        {{ session()->get('errors') }}
                </div>
                @endif
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="col-auto mb-3">
                            <label class="form-label" for="name">Customer's Name (Name will be ignored if customers has been created)</label>
                            <input class="form-control" id="name" wire:model="name" type="text">
                        </div>

                        <div class="col-auto mb-3">
                            <label class="form-label" for="phoneNumber">Customer's Phone Number</label>
                            <input class="form-control" id="phoneNumber" wire:model="phoneNumber" type="text">
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label" for="address">Address</label>
                            <input class="form-control" id="address" wire:model="address" type="text"></input>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 col-auto">
                                <label class="form-label" for="voucher_id">Voucher</label>
                                <input class="form-control" id="voucher_id" wire:model="voucher_id" type="text"></input>
                            </div>
                            
                            <div class="col-md-4 col-auto">
                                <label class="form-label" for="quantity">Payment method</label>
                                {{-- <input class="form-control" id="payment_method" wire:model="payment_method" type="text"></input> --}}
                                <select class="form-select" wire:model="payment_method" required>
                                        <option >Choose a payment</option>
                                        <option value='cash' >Cash</option>
                                        <option value='paypal'>Paypal</option>
                                </select>
                            </div>
                        </div>

                        <div class="input-group mb-3 mt-3">
                            <span class="input-group-text">Item ID</span>
                            <input class="form-control" type="number" value="0" wire:model="menu_id.0">
                            <span class="input-group-text">Quantity</span>
                            <input class="form-control" type="number" value="0" wire:model="quantity.0">
                        </div>

                        @foreach($inputs as $key => $value)
                        <div class="row mb-4">
                            <div class="col-md-8 input-group mb-3 mt-3">
                                <span class="input-group-text">Item ID</span>
                                <input class="form-control" type="number" value="0" wire:model="menu_id.{{$value}}">
                                <span class="input-group-text">Quantity</span>
                                <input class="form-control" type="number" value="0" wire:model="quantity.{{$value}}">
                            </div>
                            <div class="col-md-2">
                                <button class=" btn btn-outline-danger btn-md" wire:click.prevent="remove({{$key}})"><svg class="icon me-1">
                                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-trash')}}">
                                    </use>
                                </svg></button>
                            </div>
                        </div>
                        @endforeach

                        <div class="col-md-12 mb-3">
                            <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <button type="submit" wire:click.prevent="store()" class="btn btn-primary mb-3">Save</button>
            </div>
        </div>
    </form>
</div>
