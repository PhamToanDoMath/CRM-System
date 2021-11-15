@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <form action="{{route('admin.orders.store')}}" enctype="multipart/form-data" method="POST">
                <div class="row">
                    @csrf
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
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
                                    <label class="form-label" for="voucher_id">voucher_id</label>
                                    <textarea class="form-control" id="voucher_id" name="voucher_id" type="number"></textarea>
                                </div>
                               
                                <div class="mb-3">
                                    <label class="form-label" for="address">address</label>
                                    <textarea class="form-control" id="address" name="address" type="text"></textarea>
                                </div>

                                <div class="col-auto">
                                    <label class="form-label" for="phoneNumber">phone_number</label>
                                    <input class="form-control" id="phoneNumber" name="phoneNumber" type="text">
                                </div>

                                <br></br>
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
                                </div>

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