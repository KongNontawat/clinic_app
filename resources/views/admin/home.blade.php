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

            <div class="row gy-3">
                <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                    <a href="#!" class="menu-box text-dark d-flex flex-column justify-content-center p-4 border bg-white rounded-3">
                        <img src="{{asset('image/home.svg')}}" alt="">
                        <h4 class="text-center mt-3">Home Page Img-Svg</h4>
                        <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur</p>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                    <a href="#!" class="menu-box text-dark d-flex flex-column justify-content-center p-4 border bg-white rounded-3">
                        <img src="{{asset('image/color_icons.png')}}" alt="">
                        <h4 class="text-center mt-3">Patient Img-png</h4>
                        <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur</p>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                    <a href="#!" class="menu-box text-dark d-flex flex-column justify-content-center p-4 border bg-white rounded-3">
                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 57.3 57.29"><polygon points="28.66 0 0 24.48 28.66 48.96 57.3 24.48 28.66 0" style="fill:#7a8e9b"/><rect x="9.86" y="8.79" width="37.6" height="37.6" style="fill:#e2e2e2"/><polygon points="28.66 48.96 0 24.48 0 57.29 57.3 57.29 57.3 24.48 28.66 48.96" style="fill:#fddc85"/><polygon points="0 57.29 57.3 57.29 28.66 32.8 0 57.29" style="fill:#ffbd66"/><rect x="16.12" y="21.16" width="19.7" height="1.96" style="fill:#525c6b"/><rect x="16.12" y="15.33" width="15.22" height="1.96" style="fill:#525c6b"/><rect x="16.12" y="26.98" width="25.07" height="1.96" style="fill:#525c6b"/><path d="M58.65,12A10.63,10.63,0,1,1,48,1.36,10.64,10.64,0,0,1,58.65,12Z" transform="translate(-1.35 -1.36)" style="fill:#79ccb8"/><path d="M48,11.47c-1.32,0-2-.56-2-1.69a2,2,0,0,1,3.91,0,1,1,0,1,0,2,0A3.69,3.69,0,0,0,49,6.28V5.65a1,1,0,0,0-2,0v.63a3.7,3.7,0,0,0-2.93,3.5c0,2.21,1.54,3.64,3.91,3.64,1.3,0,1.95.54,1.95,1.69a2,2,0,0,1-3.91,0,1,1,0,1,0-2,0,3.7,3.7,0,0,0,2.93,3.5v.61a1,1,0,1,0,2,0v-.61a3.69,3.69,0,0,0,2.93-3.5C51.93,12.91,50.4,11.47,48,11.47Z" transform="translate(-1.35 -1.36)" style="fill:#525c6b"/></svg>
                    <h4 class="text-center mt-3">Doctor</h4>
                        <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur</p>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                    <a href="#!" class="menu-box text-dark d-flex flex-column justify-content-center p-4 border bg-white rounded-3">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 53.76 53.75">
                            <path d="M55.54,26.65H51.92a22.37,22.37,0,0,0-1.25-4.71l3.13-1.79a1.35,1.35,0,0,0,.48-1.84l-2-3.51a1.34,1.34,0,0,0-1.83-.48l-3.15,1.81a21.4,21.4,0,0,0-3.43-3.43l1.81-3.14a1.35,1.35,0,0,0-.48-1.84l-3.5-2a1.34,1.34,0,0,0-1.83.49L38.05,9.34a21.56,21.56,0,0,0-4.7-1.26V4.46A1.34,1.34,0,0,0,32,3.13H28a1.34,1.34,0,0,0-1.34,1.33V8.08a21.93,21.93,0,0,0-4.69,1.26L20.14,6.2a1.35,1.35,0,0,0-1.84-.49l-3.49,2a1.35,1.35,0,0,0-.49,1.84l1.81,3.14a21.4,21.4,0,0,0-3.43,3.43L9.57,14.32a1.35,1.35,0,0,0-1.84.48l-2,3.51a1.36,1.36,0,0,0,.5,1.84l3.12,1.79a22.37,22.37,0,0,0-1.25,4.71H4.46A1.33,1.33,0,0,0,3.12,28v4a1.35,1.35,0,0,0,1.34,1.33H8.08A21.87,21.87,0,0,0,9.33,38L6.21,39.85a1.36,1.36,0,0,0-.5,1.84l2,3.48a1.36,1.36,0,0,0,1.84.51l3.13-1.81a22.7,22.7,0,0,0,3.43,3.43l-1.81,3.14a1.36,1.36,0,0,0,.49,1.84l3.49,2a1.37,1.37,0,0,0,1.84-.49l1.8-3.14a22.54,22.54,0,0,0,4.69,1.26v3.62A1.34,1.34,0,0,0,28,56.87h4a1.34,1.34,0,0,0,1.34-1.33V51.92a22.14,22.14,0,0,0,4.7-1.26l1.81,3.14a1.36,1.36,0,0,0,1.83.49l3.5-2a1.36,1.36,0,0,0,.48-1.84L43.86,47.3a22.7,22.7,0,0,0,3.43-3.43l3.15,1.81a1.35,1.35,0,0,0,1.83-.51l2-3.48a1.34,1.34,0,0,0-.48-1.84L50.67,38a21.87,21.87,0,0,0,1.25-4.69h3.62A1.34,1.34,0,0,0,56.88,32V28A1.33,1.33,0,0,0,55.54,26.65Z" transform="translate(-3.12 -3.13)" style="fill:#f87670" />
                            <path d="M14.67,30a15.27,15.27,0,0,1,4.71-11l1.1,1.81L24,14.32l-7.32.17,1.16,1.91A18.26,18.26,0,0,0,30,48.26V45.32A15.34,15.34,0,0,1,14.67,30Z" transform="translate(-3.12 -3.13)" style="fill:#525c6b" />
                            <path d="M48.26,30.54A18.27,18.27,0,0,0,30,12.29v2.93A15.33,15.33,0,0,1,40.62,41.59L39.51,39.8,36,46.23,43.34,46l-1.15-1.88A18.18,18.18,0,0,0,48.26,30.54Z" transform="translate(-3.12 -3.13)" style="fill:#525c6b" />
                            <rect x="25.79" y="15.59" width="1.39" height="13.25" rx="0.64" style="fill:#525c6b" />
                            <rect x="33.29" y="25.96" width="1.39" height="10.92" rx="0.64" transform="translate(62.28 -5.69) rotate(90)" style="fill:#525c6b" />
                            <path d="M31.67,31.43a2.07,2.07,0,1,1-2.07-2.08A2.07,2.07,0,0,1,31.67,31.43Z" transform="translate(-3.12 -3.13)" style="fill:#fff" />
                        </svg>
                        <h4 class="text-center mt-3">Logs Activity</h4>
                        <p class="text-center mt-2">Lorem ipsum dolor sit amet consectetur</p>
                    </a>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                    <a href="#!" class="menu-box text-dark d-flex flex-column justify-content-center p-4 border bg-white rounded-3">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44.61 53.79">
                            <path d="M42.4,52.42a.83.83,0,0,1-.83-.82V43.9a.82.82,0,0,1,.83-.82.83.83,0,0,1,.85.82v7.7A.84.84,0,0,1,42.4,52.42Z" transform="translate(-7.69 -3.13)" style="fill:#1a171b" />
                            <path d="M42.81,14.59c0,7.3-5.26,13.23-12.8,13.23S17.19,21.89,17.19,14.59,22.45,3.13,30,3.13,42.81,7.31,42.81,14.59Z" transform="translate(-7.69 -3.13)" style="fill:#58595b" />
                            <path d="M20.82,36.75a1.53,1.53,0,0,1,.07-.47c-.93.18-1.48.32-1.48.32-.8.19-1.57.43-2.34.68a39.71,39.71,0,0,0-5.19,2.12,7.69,7.69,0,0,0-4.19,6.8v2.3a4.86,4.86,0,0,0,2.57,4.3c3.09,1.62,9,3.9,18.48,4.09V45.09C26.08,43.44,20.82,39.79,20.82,36.75Z" transform="translate(-7.69 -3.13)" style="fill:#0051c6" />
                            <path d="M48.12,39.4a35.85,35.85,0,0,0-5.2-2.12c-.77-.25-1.55-.49-2.33-.68-.5-.14-1-.27-1.5-.39a1.57,1.57,0,0,1,.11.54c0,3-5.28,6.69-7.94,8.34v11.8c9.42-.19,15.4-2.47,18.48-4.09a4.86,4.86,0,0,0,2.57-4.3V46.2A7.69,7.69,0,0,0,48.12,39.4Z" transform="translate(-7.69 -3.13)" style="fill:#0051c6" />
                            <path d="M39.09,36.21a1.67,1.67,0,0,0-1.57-1.16,1.61,1.61,0,0,0-1.3.63,1.59,1.59,0,0,0-.39,1c-.14.87-2.73,3.17-5.68,5.08h-.3c-3-1.91-5.54-4.21-5.69-5a1.68,1.68,0,0,0-1.66-1.67,1.65,1.65,0,0,0-1.61,1.2,1.53,1.53,0,0,0-.07.47c0,3,5.26,6.69,7.92,8.34v11.8l1.27,0,1.25,0V45.09c2.66-1.65,7.94-5.3,7.94-8.34A1.57,1.57,0,0,0,39.09,36.21Z" transform="translate(-7.69 -3.13)" style="fill:#cecece" />
                            <path d="M35.29,31.52H24.71a7.75,7.75,0,0,1-2.21,4.4c0,2.59,7.51,7.14,7.51,7.14s7.51-4.55,7.51-7.14A7.73,7.73,0,0,1,35.29,31.52Z" transform="translate(-7.69 -3.13)" style="fill:#ffbd66" />
                            <path d="M21.58,13.38s-1.36,3.75-1.36,4a2.13,2.13,0,0,0-1.65-.28c-1,.26-1.69,1.61-1.53,3.38s1.09,3.15,2.09,3a1.54,1.54,0,0,0,.37-.09,14.16,14.16,0,0,0,5.07,8,8.91,8.91,0,0,0,10.79,0,14,14,0,0,0,5.1-8,1.46,1.46,0,0,0,.36.09c1,.13,1.93-1.23,2.09-3s-.56-3.12-1.53-3.38a2.13,2.13,0,0,0-1.65.28c0-.26-1.36-4-1.36-4a7.59,7.59,0,0,0-8.4,0A7.65,7.65,0,0,1,21.58,13.38Z" transform="translate(-7.69 -3.13)" style="fill:#fddc85" />
                            <path d="M40,50.19l-.27-1.64a46.51,46.51,0,0,0,7.07-1.79l.56,1.57A43.52,43.52,0,0,1,40,50.19Z" transform="translate(-7.69 -3.13)" style="fill:#cecece" />
                        </svg>
                        <h4 class="text-center mt-3">Users</h4>
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