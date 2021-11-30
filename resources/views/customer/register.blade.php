@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-5">
            @if( $errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group" style="list-style: none">
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if( Session::has('message'))
                <div class="alert alert-info">
                    {{__('From now on, you will receive all notification from us on Facebook!!')}}
                </div>
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Register As Membership') }}</div>

                <form method="POST" action="{{ route('customers.register') }}">
                @csrf
                <input type="hidden" name="psid" value="{{$psid}}">
                    <div class="card-body p-3 tab-pane">
                        <input class="mb-3 form-control form-control-lg" name="phoneNumber" type="text" placeholder="Phone Number" aria-label="default input example">
                        <input class="mb-3 form-control" name="name" type="text" placeholder="Name" aria-label=".form-control-sm example">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
