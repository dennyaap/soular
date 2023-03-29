<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar/navbar.css') }}" />

    @stack('style')
</head>

<body class="antialiased">
    <div class="app">
        @include('inc.navbar')
        @yield('content')
        @include('inc.footer')
        <script src="{{ asset('js/muuri.js') }}"></script>
        <script src="{{ asset('js/web-animations.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/navbar.js') }}"></script>
        @stack('script')
    </div>
</body>

</html>