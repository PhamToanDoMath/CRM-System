@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <form action="{{route('admin.orders.store')}}" method="POST">
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
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="col-auto mb-3">
                                    <label class="form-label" for="name">Customer's Name (optional)</label>
                                    <input class="form-control" id="name" name="name" type="text">
                                </div>

                                <div class="col-auto mb-3">
                                    <label class="form-label" for="phoneNumber">Customer's Phone Number</label>
                                    <input class="form-control" id="phoneNumber" name="phoneNumber" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">

                                <div class="mb-3">
                                    <label class="form-label" for="address">Address</label>
                                    <input class="form-control" id="address" name="address" type="text"></input>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6 col-auto">
                                        <label class="form-label" for="voucher_id">Voucher</label>
                                        <input class="form-control" id="voucher_id" name="voucher_id" type="text"></input>
                                    </div>
                                    
                                    <div class="col-md-4 col-auto">
                                        <label class="form-label" for="quantity">Payment method</label>
                                        <select class="form-select" name="payment_method">
                                                <option value="cash" >Cash</option>
                                                <option value="paypal">Paypal</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="input-group mb-3 mt-3">
                                    <span class="input-group-text">Item ID</span>
                                    <input class="form-control" type="number" placeholder="Fill -1 if not chosen" name="order_items[0][menu_id]">
                                    <span class="input-group-text">Quantity</span>
                                    <input class="form-control" type="number" value="0" name="order_items[0][quantity]">
                                </div>

                                <div class="input-group mb-3 mt-3">
                                    <span class="input-group-text">Item ID</span>
                                    <input class="form-control" type="number" placeholder="Fill -1 if not chosen" name="order_items[1][menu_id]">
                                    <span class="input-group-text">Quantity</span>
                                    <input class="form-control" type="number" value="0" name="order_items[1][quantity]">
                                </div>

                                <div class="input-group mb-3 mt-3">
                                    <span class="input-group-text">Item ID</span>
                                    <input class="form-control" type="number" placeholder="Fill -1 if not chosen" name="order_items[2][menu_id]">
                                    <span class="input-group-text">Quantity</span>
                                    <input class="form-control" type="number" value="0" name="order_items[2][quantity]">
                                </div>

                                {{-- </br>
                                <div id="dynamic_form">
                                    <label class="form-label" for="description">item_id #1</label>
                                    <input type="number" name="order_items[0][menu_id]"><br></br>
                                    <label class="form-label" for="description">quantity #1</label>
                                    <input type="number" name="order_items[0][quantity]"><br></br>
                                    <label class="form-label" for="description">item_id #2</label>
                                    <input type="number" name="order_items[1][menu_id]"><br></br>
                                    <label class="form-label" for="description">quantity #2</label>
                                    <input type="number" name="order_items[1][quantity]"><br></br>
                                    <label class="form-label" for="description">item_id #3</label>
                                    <input type="number" name="order_items[2][menu_id]"><br></br>
                                    <label class="form-label" for="description">quantity #3</label>
                                    <input type="number" name="order_items[2][quantity]"><br></br>
                                </div> --}}


                                <button type="submit" class="btn btn-primary mb-3">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection