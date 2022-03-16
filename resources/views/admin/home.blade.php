@extends('admin.layouts.app')

@section('content')
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
                            <h2>MENU</h2>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper mb-30">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#0">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">

                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- end col -->
                </div> <!-- end row -->
            </div><!-- title-wrapper -->

            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 ">
                    <a href="#!" class="menu-box text-dark d-flex flex-column justify-content-center p-4 border bg-white rounded-3">
                        <i class="fa-solid fa-house-chimney fa-3x"></i>
                        <h4 class="text-center mt-3">Home Page</h4>
                        <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur</p>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 ">
                    <a href="#!" class="menu-box text-dark d-flex flex-column justify-content-center p-4 border bg-white rounded-3">
                        <i class="fa-solid fa-chart-line fa-3x"></i>
                        <h4 class="text-center mt-3">Dashboard Page</h4>
                        <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur</p>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 ">
                    <a href="#!" class="menu-box text-dark d-flex flex-column justify-content-center p-4 border bg-white rounded-3">
                        <i class="fa-solid fa-house-chimney fa-3x"></i>
                        <h4 class="text-center mt-3">Home Page</h4>
                        <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur</p>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 ">
                    <a href="#!" class="menu-box text-dark d-flex flex-column justify-content-center p-4 border bg-white rounded-3">
                        <i class="fa-solid fa-chart-line fa-3x"></i>
                        <h4 class="text-center mt-3">Dashboard Page</h4>
                        <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur</p>
                    </a>
                </div>
            </div>
        </div><!-- end container-fluid -->
    </section>
    <!-- ========== section end ========== -->

    <!-- Footer -->
    @include('admin.components.footer')
</main>
<!-- ======== main-wrapper end =========== -->

@endsection
@section('script')

@endsection