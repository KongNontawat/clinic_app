@extends('admin.layouts.app')
@section('style')

@endsection
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
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80.84 81.98"><path d="M13.25,43.21,48.62,9.93a2,2,0,0,1,2.74,0L86.75,43.21a2,2,0,0,1-1.37,3.46H14.62A2,2,0,0,1,13.25,43.21Z" transform="translate(-9.58 -9.38)" style="fill:#7a8e9b"/><rect x="6.31" y="37.28" width="68.23" height="42.8" style="fill:#c6c6c6"/><path d="M50,59.47a8.22,8.22,0,0,0-8.21,8.22V89.46H58.22V67.69A8.23,8.23,0,0,0,50,59.47Z" transform="translate(-9.58 -9.38)" style="fill:#fff"/><path d="M28.72,59.47a5.06,5.06,0,0,0-5,5.06V77H33.79V64.53A5.06,5.06,0,0,0,28.72,59.47Z" transform="translate(-9.58 -9.38)" style="fill:#fff"/><path d="M57.58,29a7.58,7.58,0,0,0-15.16,0V39H57.58Z" transform="translate(-9.58 -9.38)" style="fill:#fff"/><path d="M71.26,59.47a5.06,5.06,0,0,0-5.05,5.06V77H76.32V64.53A5.07,5.07,0,0,0,71.26,59.47Z" transform="translate(-9.58 -9.38)" style="fill:#fff"/><path d="M55.2,77a1.27,1.27,0,1,1-2.53,0,1.27,1.27,0,0,1,2.53,0Z" transform="translate(-9.58 -9.38)" style="fill:#525c6b"/><path d="M23.68,78H33.79a1,1,0,0,0,1-1V64.53a6,6,0,0,0-12,0V77A1,1,0,0,0,23.68,78Zm.95-1.9V69h8.21V76.1Zm4.09-15.66a4.1,4.1,0,0,1,4.12,4.09v2.6H24.63v-2.6A4.09,4.09,0,0,1,28.72,60.44Z" transform="translate(-9.58 -9.38)" style="fill:#525c6b"/><path d="M42.42,39.93H57.58a1,1,0,0,0,.93-1V29a8.52,8.52,0,1,0-17,0V39A1,1,0,0,0,42.42,39.93ZM43.37,38V29.92H56.63V38ZM50,22.33A6.65,6.65,0,0,1,56.54,28H43.46A6.64,6.64,0,0,1,50,22.33Z" transform="translate(-9.58 -9.38)" style="fill:#525c6b"/><path d="M66.21,78H76.32a1,1,0,0,0,1-1V64.53a6,6,0,0,0-12,0V77A1,1,0,0,0,66.21,78Zm1-1.9V69h8.21V76.1Zm4.1-15.66a4.09,4.09,0,0,1,4.11,4.09v2.6H67.16v-2.6A4.1,4.1,0,0,1,71.26,60.44Z" transform="translate(-9.58 -9.38)" style="fill:#525c6b"/><path d="M59.16,87.52V68.08a9.42,9.42,0,0,0-8.55-9.52,9.16,9.16,0,0,0-9.77,9.13V87.52a0,0,0,0,1-.05,0H10.58a1,1,0,0,0-1,1v2.75a0,0,0,0,0,0,0H90.38a0,0,0,0,0,0,0V88.57a1,1,0,0,0-1-1H59.21A0,0,0,0,1,59.16,87.52ZM42.73,67.69a7.26,7.26,0,0,1,8.21-7.19A7.47,7.47,0,0,1,57.27,68V87.53a0,0,0,0,1-.05,0H42.78a0,0,0,0,1-.05,0Z" transform="translate(-9.58 -9.38)" style="fill:#525c6b"/></svg>
                        <h4 class="text-center mt-3">Home Page</h4>
                        <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur</p>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 ">
                    <a href="#!" class="menu-box text-dark d-flex flex-column justify-content-center p-4 border bg-white rounded-3">
                        <i class="fa-solid fa-users fa-3x"></i>
                        <h4 class="text-center mt-3">Patient </h4>
                        <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur</p>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 ">
                    <a href="#!" class="menu-box text-dark d-flex flex-column justify-content-center p-4 border bg-white rounded-3">
                        <i class="fa-solid fa-user-doctor fa-3x"></i>
                        <h4 class="text-center mt-3">Doctor</h4>
                        <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur</p>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 ">
                    <a href="#!" class="menu-box text-dark d-flex flex-column justify-content-center p-4 border bg-white rounded-3">
                        <i class="fa-solid fa-book fa-3x"></i>
                        <h4 class="text-center mt-3">Logs Activity</h4>
                        <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur</p>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 ">
                    <a href="#!" class="menu-box text-dark d-flex flex-column justify-content-center p-4 border bg-white rounded-3">
                        <i class="fa-solid fa-user fa-3x"></i>
                        <h4 class="text-center mt-3">Users</h4>
                        <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur</p>
                    </a>
                </div>

            </div>

            <div class="mt-4">
                <div id="editor"></div>
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
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection