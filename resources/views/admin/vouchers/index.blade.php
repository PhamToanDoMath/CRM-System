@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">

            <div class="row">
                <div class="col-auto">
                    <a class="btn btn-primary" type="button" href="{{route('admin.vouchers.create')}}">
                        <svg class="icon me-1">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus')}}"></use>
                        </svg>New
                    </a>
                </div>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" scope="col">{{__('Voucher ID')}}</th>
                                    <th scope="col">{{__('Name')}}</th>
                                    <th scope="col">{{__('Value')}}</th>
                                    <th scope="col">{{__('Number')}}</th>
                                    <th scope="col">{{__('Availability')}}</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vouchers as $voucher)
                                    <tr class="text-center">
                                        <td>{{$voucher->voucher_id}}</td>
                                        <td>
                                            <a href="{{route('admin.vouchers.edit',$voucher)}}">
                                                {{$voucher->name}}
                                            </a>
                                        </td>
                                        <td>{{$voucher->deduction_amount}}@if($voucher->type === "amount") VND
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
                                        <td>
                                            <div class="col-auto">
                                                <form method="POST" action="{{ route('admin.vouchers.destroy',$voucher)}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-outline-danger btn-sm" type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this?');"><svg
                                                            class="icon me-1">
                                                            <use
                                                                xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-trash')}}">
                                                            </use>
                                                        </svg>
                                                    </button>
                                                </form>
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

