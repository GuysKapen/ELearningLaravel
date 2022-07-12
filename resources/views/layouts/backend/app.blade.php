<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('/favicon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/jBox.all.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @stack('css')
</head>

<body class="theme-blue">
    <!-- Top Bar -->
    @include('layouts.nav_bar')
    <!-- #Top Bar -->
    <div class="flex">
        <section>
            <!-- Left Sidebar -->
            @include('layouts.backend.partial.sidebar')
            <!-- #END# Left Sidebar -->
        </section>

        <section class="content flex-grow">
            @yield('content')
        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    {{-- Popup plugin --}}
    <script src="{{ asset('js/jbox/jBox.all.js') }}" referrerpolicy="origin"></script>
    <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
    @stack('js')
</body>

</html>
