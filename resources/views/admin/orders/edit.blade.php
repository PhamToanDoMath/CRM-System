@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <div class="row justify-content-center">
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
                    <form action="{{route('admin.orders.update', $order)}}" method="POST">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong><h5>Customer</h5></strong>
                            </div>
                            <div class="card-body">
                                @method('PUT')
                                @csrf
                                @if( $errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-group" style="list-style: none">
                                        @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <div class="mb-3">
                                    <label class="form-label" for="name">Name (optional)</label>
                                    <input class="form-control" id="name" name="name" value="{{$customer->name}}"
                                        type="text">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="phoneNumber">Phone Number(*)</label>
                                    <input class="form-control" id="phoneNumber" name="phoneNumber"
                                        value="{{$customer->phoneNumber}}" type="text">
                                </div>

                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong><h5>Order</h5></strong>
                            </div>
                            <div class="card-body">

                                <div class="mb-3">
                                    <label class="form-label" for="Address">Address(*)</label>
                                    <input class="form-control" id="Address" name="address"
                                        value="{{$order->address}}" type="text">
                                </div>


                                <div class="row mb-3">
                                    <div class="col-auto">
                                        <label class="form-label" for="Voucher">Voucher</label>
                                        <input class="form-control" id="Voucher" name="voucher_id"
                                            value="{{$order->voucher_id}}" type="text">
                                    </div>

                                    <div class="col-auto">
                                        <label class="form-label" for="quantity">Payment method</label>
                                        <select class="form-select" name="payment_method">
                                                <option value="cash" 
                                                @if($order->payment_method === 'cash') selected @endif>
                                                    Cash
                                                </option>
                                                <option value="paypal" 
                                                @if($order->payment_method === 'paypal') selected @endif>
                                                    Paypal
                                                </option>
                                        </select>
                                    </div>
                                </div>


                                {{-- <br></br>
                                <div id="dynamic_form">
                                    <label class="form-label" for="description">item_id #1</label>
                                    <input type="number" name="order_items[0][menu_id]" ><br></br>
                                    <label class="form-label" for="description">quantity #1</label>
                                    <input type="number" name="order_items[0][quantity]" ><br></br>
                                    <label class="form-label" for="description">item_id #2</label>
                                    <input type="number" name="order_items[1][menu_id]" ><br></br>
                                    <label class="form-label" for="description">quantity #2</label>
                                    <input type="number" name="order_items[1][quantity]"><br></br>
                                    <label class="form-label" for="description">item_id #3</label>
                                    <input type="number" name="order_items[2][menu_id]"><br></br>
                                    <label class="form-label" for="description">quantity #3</label>
                                    <input type="number" name="order_items[2][quantity]"><br></br>
                                </div> --}}

                                <div class="input-group mb-3 mt-3">
                                    <span class="input-group-text">Item ID</span>
                                    <input class="form-control" type="number" placeholder="Fill -1 if not chosen"
                                        name="order_items[0][menu_id]">
                                    <span class="input-group-text">Quantity</span>
                                    <input class="form-control" type="number" value="" name="order_items[0][quantity]">
                                </div>

                                <div class="input-group mb-3 mt-3">
                                    <span class="input-group-text">Item ID</span>
                                    <input class="form-control" type="number" placeholder="Fill -1 if not chosen"
                                        name="order_items[1][menu_id]">
                                    <span class="input-group-text">Quantity</span>
                                    <input class="form-control" type="number" value="0" name="order_items[1][quantity]">
                                </div>

                                <div class="input-group mb-3 mt-3">
                                    <span class="input-group-text">Item ID</span>
                                    <input class="form-control" type="number" placeholder="Fill -1 if not chosen"
                                        name="order_items[2][menu_id]">
                                    <span class="input-group-text">Quantity</span>
                                    <input class="form-control" type="number" value="0" name="order_items[2][quantity]">
                                </div>


                                <button type="submit" class="btn btn-primary mb-3">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection