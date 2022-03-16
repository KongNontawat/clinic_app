<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kanit_thai/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    @include('layouts.navbar')
    @yield('content')
    @include('layouts.footer')

    @include('layouts.link_js')
    @yield('link_js')

    <script src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>

<!-- D:\Xampp\htdocs\clinic_app\public\js\select2\dist\js\select2.min.js -->