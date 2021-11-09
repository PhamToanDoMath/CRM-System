@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>{{__('Voucher ID')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Amount')}}</th>
                                    <th>{{__('Usage')}}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vouchers as $voucher)
                                    <tr class="text-center">
                                        <td>{{$voucher->voucher_id}}</td>
                                        <td> {{$voucher->name}}</td>
                                        <td>{{$voucher->deduction_amount}}@if($voucher->type === "amount")đ
                                            @elseif ($voucher->type === "precentage")%
                                            @endif
                                        </td>
                                        <td>{{$voucher->used_voucher}}/{{$voucher->released_voucher}}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" style="margin-left:auto" type="checkbox"
                                                    id="is_available" @if($voucher->is_enable) checked @endif>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

