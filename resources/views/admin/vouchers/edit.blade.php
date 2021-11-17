@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{route('admin.vouchers.update',$voucher)}}" method="POST">
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
                                <label class="form-label" for="voucher_id">Voucher ID</label>
                                <input class="form-control" id="voucher_id" name="voucher_id" value="{{$voucher->voucher_id}}" type="text">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control" id="name" name="name" value="{{$voucher->name}}" type="text">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="type">Type</label>
                                <input class="form-control" id="type" name="type" value="{{$voucher->type}}" type="text">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="deduction_amount">Deduction Amount</label>
                                <input class="form-control" id="deduction_amount" name="deduction_amount"
                                       value="{{$voucher->deduction_amount}}" type="text">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="start_from">Start From</label>
                                <input class="form-control" id="start_from" name="start_from" value="{{$voucher->start_from->format('Y-m-d')}}" type="date">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="end_at">End At</label>
                                <input class="form-control" id="end_at" name="end_at" value="{{$voucher->end_at->format('Y-m-d')}}" type="date">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="is_enable">Availability</label>
                                <input class="form-control" id="is_enable" name="is_enable" value="{{$voucher->is_enable}}" type="text">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="released_voucher">Number of Released Voucher</label>
                                <input class="form-control" id="released_voucher" name="released_voucher"
                                       value="{{$voucher->released_voucher}}" type="text">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="used_voucher">Number of Used Voucher</label>
                                <input class="form-control" id="used_voucher" name="used_voucher"
                                       value="{{$voucher->used_voucher}}" type="text">
                            </div>

                            <button type="submit" class="btn btn-primary mb-3">Save</button>

                            <form method="POST" action="{{ route('admin.vouchers.destroy',$voucher)}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger mb-3" type="submit"
                                        onclick="return confirm('Are you sure you want to delete this?');">
                                    Delete
                                </button>
                            </form>

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
