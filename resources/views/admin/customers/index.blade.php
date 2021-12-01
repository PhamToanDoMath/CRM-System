@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<main class="c-main">
    <div class="c-body">
        <div class="container">    
            <div class="row justify-content-center">
                @livewire('search-bar')
            </div>
        </div>
    </div>
</main>
@endsection