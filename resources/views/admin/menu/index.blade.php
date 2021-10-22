@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-responsive-sm">
                                <tr>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Category')}}</th>
                                    <th>{{__('Price')}}</th>
                                    <th>{{__('Quantity')}}</th>
                                    <th>{{__('Availablity')}}</th>
                                </tr>
                                {{-- @foreach($menus as $menu)
                                    <tr>
                                        <td>{{$menu->id}}</td>
                                        <td>{{$menu->name}}</td>
                                        <td>{{$menu->category_id}}</td>
                                        <td>{{$menu->price}}</td>
                                        <td>{{$menu->is_available}}</td>
                                    </tr>
                                @endforeach --}}
                                <tr>
                                    <td>#100001</td>
                                    <td>Spicy Chilled Meat</td>
                                    <td>Food</td>
                                    <td>50.000</td>
                                    <td>123</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_available" checked>
                                        </div>
                                    </td>
                                </tr>
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

