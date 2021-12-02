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
        <div class="col-auto mb-4">
            <div class="row mb-4">
                <div class="col-md-2">
                    <a class="btn btn-primary" type="button" href="{{route('admin.customers.create')}}">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus')}}"></use>
                        </svg>New
                    </a>
                </div>
                <div class="col-md-8">
                    <input type="text" class="d-inline form-control" wire:model.delay.longer="searchInput" placeholder="Search Name Or Phone Number"></input>
                </div>
                <div class="col-md-2">
                    <a href="{{route('admin.export.customers')}}"
                    class="btn btn-success"><svg class="icon me-3">
                        <use xlink:href="{{asset('/vendors/@coreui/icons/svg/free.svg#cil-cloud-download')}}"></use>
                      </svg>Export</a>
                </div>
            </div>
            
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
                        <th style="vertical-align:middle">{{__('Action')}}</th>

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
                        <td>@if($customer->address){{$customer->address}}@else N/A @endif</td>
                        <td>{{$customer->created_at->format('d-m-Y')}}</td>
                        <td><a href="{{route('admin.customers.edit',$customer)}}"
                                class="btn btn-warning d-inline btn-sm">Edit</a>
                            {!!Form::open(['action' => ['CustomerController@destroy', $customer->id],
                            'method' => 'POST', 'class' => 'pull-right d-inline'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm'] )}}
                            {!!Form::close()!!}
                            {{-- <form class="d-inline" method="POST" action="{{route('admin.customers.destroy',$customer->id)}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Are you sure you want to delete this?');">Delete
                                </button>
                            </form> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="d-flex justify-content-center"> {{ $customers->links()}} </div> --}}
        </div>
    </div>
</div>
