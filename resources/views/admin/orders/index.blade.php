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
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Customer Name')}}</th>
                                    <th>{{__('Address')}}</th>
                                    <th>{{__('Total purchased')}}</th>
                                    <th>{{__('Payment method')}}</th>                                    
                                    <th>{{__('Created At')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr class="text-center">
                                        <td>{{$order->id}}</td>
                                        <td> Currently not available</td>
                                        <td>{{$order->address}}</td>
                                        <td>{{$order->total}} đ</td>
                                        <td><svg class="icon">
                                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-wallet')}}"></use>
                                        </svg></td>
                                        <td>{{$order->created_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center"
                            {{ $orders->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

