@extends('layouts.app')

@section('content')
    <main class="c-main">
        <div class="c-body">
            <div class="container">
                <form action="{{route('admin.vouchers.store')}}" enctype="multipart/form-data" method="POST">
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
                                        <label class="form-label" for="voucher_id">Voucher ID</label>
                                        <input class="form-control" id="voucher_id" name="voucher_id" type="text">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input class="form-control" id="name" name="name" type="text">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="type">Type (percentage or amount)</label>
                                        <input class="form-control" id="type" name="type" value="amount" type="text">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="deduction_amount">Deduction Amount</label>
                                        <input class="form-control" id="deduction_amount" name="deduction_amount"
                                               value="0" type="text">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="start_from">Start From</label>
                                        <input class="form-control" id="start_from" name="start_from" type="date">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="end_at">End At</label>
                                        <input class="form-control" id="end_at" name="end_at" type="date">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="is_enable">Availability</label>
                                        <input class="form-control" id="is_enable" name="is_enable" value="1" type="text">

                                    <div class="mb-3">
                                        <label class="form-label" for="released_voucher">Number of Released Voucher</label>
                                        <input class="form-control" id="released_voucher" name="released_voucher"
                                               value="0" type="text">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="used_voucher">Number of Used Voucher</label>
                                        <input class="form-control" id="used_voucher" name="used_voucher"
                                               value="0" type="text">
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
