<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CoreUI CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.0.2/dist/css/coreui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link rel="stylesheet" href="{{ asset('css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">  
    @livewireStyles
</head>
<body>

    <!-- Sidebar -->
    @include('partials.sidebar')

    <div class="wrapper d-flex flex-column min-vh-100 bg-light dark:bg-transparent">
        <!-- Header -->
        @include('partials.header')
        <!-- Content section -->
        @yield('content')
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.0.2/dist/js/coreui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/prism.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/plugins/autoloader/prism-autoloader.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/plugins/unescaped-markup/prism-unescaped-markup.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/plugins/normalize-whitespace/prism-normalize-whitespace.js"></script>
    <script src="{{ asset('js/dark-theme.js')}}"></script>
    @yield('scripts')
    @livewireScripts
    {{-- <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script> --}}
</body>
</html>
