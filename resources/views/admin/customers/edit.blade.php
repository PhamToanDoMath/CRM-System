@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{route('admin.customers.update',$customer)}}" method="POST">
                            @method('PUT')
                            @csrf
                            @if( $errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-group" style="list-style: none">
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control" id="name" name="name" value="{{$customer->name}}" type="text">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                <input class="form-control" id="phoneNumber" name="phoneNumber" value="{{$customer->phoneNumber}}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="address">Address</label>
                                <input class="form-control" id="address" name="address" type="text" value="{{$customer->address}}">
                            </div>
                            <button type="submit" class="btn btn-primary mb-3">Save</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</main>
@endsection