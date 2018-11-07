<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--<!-- CSRF Token -->--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{--<!-- Styles -->--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{asset('img/brand/favicon.png') }}" rel="icon" type="image/png">
    {{--<!-- Fonts -->--}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    {{--icons--}}
    <link href="{{asset('fonts/nucleoIcons/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('fonts/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
 </head>
<body>
    <div id="app">
        @include('partials.sidebar')

        <div class="main-content">

            @yield('content')

        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
