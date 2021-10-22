@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                    <form action="{{route('admin.menu.update',$menu)}}" method="POST">
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
                            <input class="form-control" id="name" name="name" value="{{$menu->name}}" type="text">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{$menu->description}}</textarea>
                        </div>
 
                        {{-- <div class="mb-3">
                            <label class="form-label" for="description">Image Link</label>
                            <input class="form-control" id="image" name="image_link" type="text" placeholder="https://images.com/url">
                        </div> --}}

                        <div class="row mb-3 ">
                            <div class="col-auto">
                                <label class="form-label" for="description">Price</label>
                                <input class="form-control" id="price" name="price" value="{{$menu->price}}" type="text">
                            </div>
                            <div class="col-auto">
                                <label class="form-label" for="description">Quantity</label>
                                <input class="form-control" type="number" id="quantity" value="{{$menu->quantity}}" name="quantity" step="1">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Save</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection