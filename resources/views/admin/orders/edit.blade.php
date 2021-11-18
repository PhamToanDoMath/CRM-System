@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            @livewire('order-table-update',[
                'phoneNumber' => $customer->phoneNumber,
                'name' => $customer->name,
                'address' => $order->address,
                'voucher_id' => $order->voucher_id,
                'payment_method' => $order->payment_method,
                'order_id' => $order->id,
                'total' => $order->total,
                'count_items' => count($orderItems)
            ])
        </div>
    </div>
    </div>
</main>
@endsection