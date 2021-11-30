@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <form action="{{route('admin.customers.store')}}" method="POST">
                <div class="row justify-content-center">
                    @csrf
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
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
                                    <label class="form-label" for="name">Full Name</label>
                                    <input class="form-control" id="name" name="name" type="text">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="address">Address</label>
                                    <textarea class="form-control" id="address" name="address"
                                        rows="1"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="phoneNumber">Phone Number</label>
                                    <input class="form-control" id="phoneNumber" name="phoneNumber"></input>
                                </div>

                                <button type="submit" class="btn btn-primary mb-3">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection