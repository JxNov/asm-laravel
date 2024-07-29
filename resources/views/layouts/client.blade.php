<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Pustok - Book Store
    </title>
    @vite('resources/css/app.css')
    <link rel="shortcut icon" type="image/x-icon" href="{{ Vite::asset('resources/images/favicon.ico') }}">
    @stack('styles')
</head>
<body>
<div class="site-wrapper" id="top">
    @include('client.blocks.header')

    @yield('content')
</div>

@include('client.blocks.footer')

@vite('resources/js/app.js')
@stack('scripts')
</body>
</html>
