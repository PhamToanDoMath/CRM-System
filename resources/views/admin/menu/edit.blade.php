@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
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
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            @if($menu->getFirstMediaUrl('images', 'thumb') !== "")
                                <div class="mt-3">
                                    <img class="d-block" 
                                        src="{{$menu->getFirstMediaUrl('images', 'thumb')}}"
                                        / width="100%"
                                    >
                                </div>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary btn-sm">Upload image</a>
                                    <form class="d-inline" action="" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit"
                                        onclick="return confirm('Are you sure you want to delete this?');"
                                        >Remove</button>
                                    </form>
                                </div>
                            @else 
                                <div class="mt-3">
                                    <img class="d-block" 
                                        src="{{asset('assets/img/no-image.png')}}"
                                        / width="100%"
                                    >
                                </div>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary btn-sm">Upload image</a>
                                </div>
                            @endif                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</main>
@endsection