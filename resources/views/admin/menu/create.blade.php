@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <form action="{{route('admin.menu.store')}}" enctype="multipart/form-data" method="POST">
                <div class="row">
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
                                    <label class="form-label" for="name">Name</label>
                                    <input class="form-control" id="name" name="name" type="text">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description"
                                        rows="3"></textarea>
                                </div>

                                <div class="row mb-3 ">
                                    <div class="col-auto">
                                        <label class="form-label" for="price">Price</label>
                                        <input class="form-control" id="price" name="price" value="0" type="text">
                                    </div>
                                    <div class="col-auto">
                                        <label class="form-label" for="quantity">Quantity</label>
                                        <input class="form-control" type="number" id="quantity" value="0"
                                            name="quantity" step="1">
                                    </div>
                                    <div class="col-auto">
                                        <label class="form-label" for="quantity">Group</label>
                                        <select class="form-select" aria-label="Choose group" name="menu_group_id">
                                            @foreach(\App\Models\MenuGroup::all() as $group)
                                                <option value="{{$group->id}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mb-3">Save</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input class="form-control" type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</main>
@endsection