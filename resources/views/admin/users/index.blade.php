@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card">
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>{{__('Phone Number')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Address')}}</th>
                                    <th>{{__('Created At')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{$customer->phoneNumber}}</td>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->address}}</td>
                                        <td>{{$customer->created_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center"
                            {{ $customers->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

