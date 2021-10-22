@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">

            <div class="col-auto">
                <a class="btn btn-primary" type="button" href="{{route('admin.menu.create')}}">
                    <svg class="icon me-1">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus')}}"></use>
                    </svg>New
                </a>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-responsive-sm table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">{{__('ID')}}</th>
                                    <th scope="col">{{__('Name')}}</th>
                                    <th scope="col">{{__('Category')}}</th>
                                    <th scope="col">{{__('Price')}}</th>
                                    <th scope="col">{{__('Quantity')}}</th>
                                    <th scope="col">{{__('Availablity')}}</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menus as $menu)
                                    <tr class="text-center">
                                            <th scope="row">{{$menu->id}}</th>
                                            <td>
                                                <a href="{{route('admin.menu.edit',$menu)}}">
                                                    {{$menu->name}}</a>
                                            </td>
                                            <td>N/A</td>
                                            <td>{{$menu->price}}</td>
                                            <td>{{$menu->quantity}}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" style="margin-left:auto" type="checkbox" id="is_available" 
                                                    @if($menu->is_available) checked @endif>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col-auto">
                                                    <form method="POST" action="{{route('admin.menu.destroy',$menu)}}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-outline-danger btn-sm" type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this?');"><svg class="icon me-1">
                                                                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-trash')}}"></use>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="d-flex justify-content-center"
                            {{ $customers->links()}}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

