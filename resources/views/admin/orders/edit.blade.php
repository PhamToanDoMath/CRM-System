@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{route('admin.orders.update', $order)}}" method="POST">
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
                            
                            <!-- <div class="mb-3">
                                <label class="form-label" for="address">address</label>
                                <input class="form-control" id="address" name="address" value="{{$order->address}}" type="text">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="phone_number">phone_number</label>
                                <input class="form-control" id="phone_number" name="phone_number" type="text">
                            </div> -->
                         
                            <!-- <div class="col-auto">
                                <label class="form-label" for="description">voucher_id</label>
                                <input class="form-control" id="voucher_id" name="voucher_id" value="{{$order->voucher_id}}" type="number">
                            </div> -->

                           

                            <br></br>
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
                            </div>
                          
                            <button type="submit" class="btn btn-primary mb-3">Save</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</main>
@endsection

