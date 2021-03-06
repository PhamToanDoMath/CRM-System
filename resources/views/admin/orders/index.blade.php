@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <div class="row mb-4">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="col-auto">
                    <a class="btn btn-primary" type="button" href="{{route('admin.orders.create')}}">
                        <svg class="icon me-1">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus')}}"></use>
                        </svg>New
                    </a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
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
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr class="text-center">
                                        <td>
                                            <a href="{{route('admin.orders.edit',$order)}}">
                                                {{$order->id}}</a>
                                        </td>
                                        <td>{{$order->phoneNumber}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>{{$order->total}}$</td>
                                        <td><svg class="icon" style="width:1.8rem;height:1.8rem;">
                                            @if($order->payment_method == 'paypal')
                                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/brand.svg#cib-cc-paypal')}}"></use>
                                            @else
                                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-wallet')}}"></use>
                                            @endif
                                        </svg></td>
                                        <td>{{$order->created_at->format('h:s d-m-Y')}}</td>
                                        <td>
                                            <form action="{{route('admin.orders.elevateStatus',$order->id)}}" method="POST">
                                                @csrf
                                                @if($order->order_status == 0 )
                                                <button class="btn btn-warning" type="submit"
                                                onclick="return confirm('Are you sure you want to confirm this?');">
                                                    Waiting
                                                </button>
                                                @elseif($order->order_status == 1)
                                                <button class="btn btn-success" type="submit"
                                                onclick="return confirm('Are you sure you want to prepare this order?');">
                                                    Prepare
                                                </button>
                                                @elseif($order->order_status == 2)
                                                <button class="btn btn-info" type="submit"
                                                onclick="return confirm('Are you sure you want to complete this order?');">
                                                    Complete
                                                </button>
                                                @else
                                                <button class="btn btn-success disabled">Completed</button>
                                                @endif
                                            </form>
                                        </td>
                                        <td>
                                            <div class="col-auto">
                                                <form method="POST" action="{{route('admin.orders.destroy',$order)}}">
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

