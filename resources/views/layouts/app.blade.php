<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="base_api" content="{{ url('/') }}">

    <meta name="USER_ID" content="{{ Auth::id() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- ICons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/solid.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="wrapper">
            <header>
                @include('layouts.header')
                @if (session('notification'))
                    <div class="bg-red-200 border-l-4 text-center p-2" role="alert">
                      <p>{{ session('notification') }}</p>
                    </div>
                @endif
            </header>

            <main class="flex-grow">
                @yield('content')
            </main>
            @include('layouts.footer')
        </div>
    </div>
</body>
</html>
