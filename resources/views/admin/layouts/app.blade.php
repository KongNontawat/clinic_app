<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <link rel="icon" href="{{ asset('image/Logo_Beauty_Care1.png') }}" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }}</title>

  <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fontawesome/all.min.css') }}">
  <!-- <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="{{ asset('css/kanit_thai/index.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
  @yield('style')
</head>

<body>
  @include('admin.components.sidebar')
  <div class="overlay"></div>
  @yield('content')

  <script src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/fontawesome/all.min.js') }}"></script>
  <script src="{{ asset('js/admin/main.js') }}"></script>
  <script src="{{ asset('js/admin/custom.js') }}"></script>

  @yield('script')

</body>

</html>

<!-- Other Style
<link rel="stylesheet" href="{{ asset('js/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/flatpickr/dist/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/aos/dist/aos.css') }}">
-->

<!-- Other Script
<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('js/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script> 
<script src="{{ asset('js/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('js/aos/dist/aos.js') }}"></script>
<script src="{{ asset('js/chart.js/dist/chart.min.js') }}"></script>
<script src="{{ asset('js/cleave.js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('js/parsleyjs/dist/parsley.min.js') }}"></script>
<script src="{{ asset('js/ckeditor5/build/ckeditor.js') }}"></script>
-->