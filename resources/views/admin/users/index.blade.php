@extends('layouts.app')

@livewireStyles
</head>
<body>
    ...
 
    @livewireScripts
</body>
</html>

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
                                    <th style="vertical-align:middle">{{__('Phone Number')}}</th>
                                    <th style="vertical-align:middle">
                                    {{__('Name')}}
                                    <span style="float: right; cursor: pointer">⮃</span>
                                    </th>
                                    <th style="vertical-align:middle">{{__('Address')}}</th>
                                    <th style="vertical-align:middle">{{__('Created At')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{$customer->phoneNumber}}</td>
                                        <td>
                                            @if(!$customer->name) N/A
                                            @else {{$customer->name}}
                                            @endif
                                        </td>
                                        <td>{{$customer->address}}</td>
                                        <td>{{$customer->created_at}}</td>
                                        <td><a href="{{route('admin.customers.edit',$customer)}}" class="btn btn-secondary">Edit</a></td>
                                        <td>
                                            {!!Form::open(['action' => ['CustomerController@destroy', $customer->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Delete', ['class' => 'btn btn-secondary-sm'] )}}
                                            {!!Form::close()!!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center"
                            {{ $customers->links()}}
                        </div>
                    </div>
                        <a href="/admin/customers/create/" class="btn btn-primary" style="margin-top: 20px">Add Customer</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

