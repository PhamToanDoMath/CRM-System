<div>
    <div class="col-md-10">
        @if( $errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group" style="list-style: none">
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        
        <div class="row">
            <div class="col-md-11 col-auto">
                <input type="text" class="d-inline form-control" wire:model.delay.longer="phoneNumber" placeholder="Enter your Phone Number"></input>
            </div>
            <div class="col-md-1 mb-4">
                <button class="btn btn-info" wire:click="returnResult()">Search</button>
            </div>
        </div>
        @foreach($historyPurchase as $order)
            <div class="card mb-3">
                <table class="table table-responsive-sm">
                    <thead>
                        <tr class="justify-content-center text-center">
                            <th>{{__('ID')}}</th>
                            <th>{{__('Shipping Address')}}</th>
                            <th>{{__('Total')}}</th>
                            <th>{{__('Created At')}}</th>
                            <th>{{__('Status')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>#@php(printf('%08d', $order->id))
                            </td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->total}}$</td>
                            <td>{{$order->created_at}}</td>
                            <td>
                                @switch($order->order_status)
                                    @case(0)
                                        <span>Waiting</span>
                                    @break

                                    @case(1)
                                        <span>Confirmed</span>
                                        @break

                                    @case(2)
                                        <span>Prepraring</span>
                                        @break

                                    @case(3)
                                        <span>Completed</span>
                                    @break

                                    @default
                                        <span></span>
                                @endswitch
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</div>
