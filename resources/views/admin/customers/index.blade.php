@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-10">
                    <div class="col-auto mb-4">
                        <a class="btn btn-primary" type="button" href="{{route('admin.customers.create')}}">
                            <svg class="icon me-2">
                                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus')}}"></use>
                            </svg>New
                        </a>
                    </div>
                    <div class="card">
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr class="justify-content-center text-center">
                                    <th>{{__('Phone Number')}}</th>
                                    <th style="vertical-align:middle">
                                        {{__('Name')}}
                                        {{-- <span style="float: right; cursor: pointer">⮃</span> --}}
                                    </th>
                                    <th style="vertical-align:middle">{{__('Address')}}</th>
                                    <th style="vertical-align:middle">{{__('Created At')}}</th>
                                    <th style="vertical-align:middle">{{__('')}}</th>
                                    <th style="vertical-align:middle">{{__('')}}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                <tr class="text-center">
                                    <td>{{$customer->phoneNumber}}</td>
                                    <td>
                                        @if(!$customer->name) N/A
                                        @else {{$customer->name}}
                                        @endif
                                    </td>
                                    <td>{{$customer->address}}</td>
                                    <td>{{$customer->created_at}}</td>
                                    <td><a href="{{route('admin.customers.edit',$customer)}}"
                                            class="btn btn-warning">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['CustomerController@destroy', $customer->id],
                                        'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'] )}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center"> {{ $customers->links()}} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection