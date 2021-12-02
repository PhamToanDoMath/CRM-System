@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <div class="row justify-content-center">
                    <div class="col-md-12 mb-2">
                        @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <div class="col-auto mb-3">
                        <a class="btn btn-primary" type="button" href="{{route('clerk.orders.create')}}">
                            <svg class="icon me-1">
                                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus')}}"></use>
                            </svg>New
                        </a>
                    </div>
                    <div class="card">
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Phone Number')}}</th>
                                    <th>{{__('Address')}}</th>
                                    <th>{{__('Total purchased')}}</th>
                                    <th>{{__('Payment method')}}</th>                                    
                                    <th>{{__('Created At')}}</th>
                                    <th>{{__('Status')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr class="text-center">
                                        <td>
                                            <a href="{{route('clerk.orders.edit',$order)}}">
                                                {{$order->id}}</a>
                                        </td>
                                        <td>{{$order->phoneNumber}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>{{$order->total}} đ</td>
                                        <td><svg class="icon" style="width:1.8rem;height:1.8rem;">
                                            @if($order->payment_method == 'paypal')
                                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/brand.svg#cib-cc-paypal')}}"></use>
                                            @endif
                                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-wallet')}}"></use>
                                        </svg></td>
                                        <td>{{$order->created_at->format('d-m-Y')}}</td>
                                        <td>
                                            <form action="{{route('clerk.orders.confirmAsClerk',$order->id)}}" method="POST">
                                                @csrf
                                                @if($order->order_status == 0)
                                                <button class="btn btn-warning" type="submit"
                                                onclick="return confirm('Are you sure you want to confirm this?');">
                                                    Confirm
                                                </button>
                                                @elseif($order->order_status == 1 )
                                                <button class="btn btn-info disabled">
                                                    Confirmed</button>
                                                @endif
                                            </form>
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

