@extends('layouts.app')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">
            @livewire('order-table')
        </div>
    </div>
</main>
@endsection