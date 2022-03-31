@extends('admin.layouts.app')
@section('style')

@endsection
@section('content')
@include('sweetalert::alert')
<!-- ======== main-wrapper start =========== -->
<main class="main-wrapper">

    <!-- ========== section start ========== -->
    <section class="section">
        <!-- Navbar -->
        @include('admin.components.navbar')
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>Dashboard</h2>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper mb-30">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#!">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- end col -->
                </div> <!-- end row -->
            </div><!-- title-wrapper -->



        </div><!-- end container-fluid -->
    </section>
    <!-- ========== section end ========== -->

    <!-- Footer -->
    @include('admin.components.footer')
</main>
<!-- ======== main-wrapper end =========== -->

@endsection
@section('script')
<script>
    $(function() {
        $('.dashboard').addClass('active')
    })
</script>
@endsection