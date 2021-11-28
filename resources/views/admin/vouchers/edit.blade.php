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

                                    {{-- --}
                                    <div class="mb-3">
                                        <label class="form-label" for="type">Type</label>
                                        <select class="form-control" id="type" name="type" value="{{$voucher->type}}">
                                            <option {{{ (isset($voucher->type) && $voucher->type == 'Amount') ? "selected=\"selected\"" : "" }}} value="Amount">
                                                Amount
                                            </option>
                                            <option {{{ (isset($voucher->type) && $voucher->type == 'Percentage') ? "selected=\"selected\"" : "" }}} value="Percentage">
                                                Percentage
                                            </option>
                                        </select>
                                    </div>
                                    {{-- --}}
                                    <div class="mb-3">
                                        @livewire('voucher-type', ['model' => $voucher, 'field' => 'type'], key($voucher->voucher_id))
                                        {{--
                                        <label class="form-label" for="type">Type</label>
                                        <select class="form-control" id="type" name="type" wire:model="type" value="{{$voucher->type}}">
                                            <option @if($voucher->type === 'Amount') selected @endif value="Amount">
                                                Amount
                                            </option>
                                            <option @if($voucher->type === 'Percentage') selected @endif value="Percentage">
                                                Percentage
                                            </option>
                                        </select>
                                        --}}
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="deduction_amount">Deduction Amount</label>
                                        <input class="form-control" id="deduction_amount" name="deduction_amount"
                                               value="{{$voucher->deduction_amount}}" type="text">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="start_from">Start From</label>
                                        <input class="form-control" id="start_from" name="start_from"
                                               value="{{$voucher->start_from->format('Y-m-d')}}" type="date">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="end_at">End At</label>
                                        <input class="form-control" id="end_at" name="end_at"
                                               value="{{$voucher->end_at->format('Y-m-d')}}" type="date">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="released_voucher">Number of Released Voucher</label>
                                        <input class="form-control" id="released_voucher" name="released_voucher"
                                               value="{{$voucher->released_voucher}}" type="text">
                                    </div>

                                    {{--
                                    <div class="form-group">
                                        <label for="is_enable">Availability</label>
                                        @livewire('voucher-status', ['model' => $voucher, 'field' => 'is_enable'], key($voucher->voucher_id))

                                        <label class="radio-inline">
                                            <input type="radio" name="is_enable" value="{{$voucher->is_enable}}"
                                                {{{ ($voucher->is_enable == '1') ? "checked" : "" }}}>
                                            Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="is_enable" value="{{$voucher->is_enable}}"
                                                {{{ ($voucher->is_enable == '0') ? "checked" : "" }}}>
                                            No
                                        </label>
                                    </div>
                                    --}}

                                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                                    {{--
                                    <a class="btn btn-outline-danger mt-3" type="button" href="{{route('admin.vouchers.destroy',$voucher)}}">
                                        Delete
                                    </a>
                                    --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

