@extends('layouts.page')

@section('content')
<main class="c-main">
    <div class="c-body">
        <div class="container">    
            <div class="row justify-content-center mt-5">
                @livewire('history-purchase')
            </div>
        </div>
    </div>
</main>
@endsection
