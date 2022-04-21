@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/home.css') }}">
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
@endsection
@section('content')
@include('sweetalert::alert')
<!-- ======== main-wrapper start =========== -->
<main class="main-wrapper">

    <!-- ========== section start ========== -->
    <section class="section">
        <!-- Navbar -->
        @include('admin.components.navbar')
        <div class="container-fluid d-flex justify-content-center align-items-center">
            <!-- ========== title-wrapper start ========== -->
            <h1 class="display-1 text-muted">Coming Soon</h1>
        </div><!-- end container-fluid -->
    </section>
    <!-- ========== section end ========== -->

    <!-- Footer -->
    @include('admin.components.footer')
</main>
<!-- ======== main-wrapper end =========== -->
@endsection
@section('script')
<script src="{{ asset('js/admin/bill/bill.js') }}"></script>

@endsection