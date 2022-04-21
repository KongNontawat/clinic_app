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

            <div class="row">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon purple">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Patients</h6>
                            <h3 class="text-bold mb-10">{{$count_patient}}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon success">
                            <i class="fa-solid fa-user-doctor"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Doctors</h6>
                            <h3 class="text-bold mb-10">{{$count_doctor}}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon primary">
                            <i class="fa-solid fa-user-nurse"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Employees</h6>
                            <h3 class="text-bold mb-10">{{$count_employee}}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon orange">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Users</h6>
                            <h3 class="text-bold mb-10">{{$count_user}}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-12">
                    <div class="icon-card mb-20">
                        <div class="icon purple">
                            <i class="fa-solid fa-calendar-day"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Today's</h6>
                            <h3 class="text-bold">{{$today}} ราย</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-12">
                    <div class="icon-card mb-20">
                        <div class="left d-flex me-5">
                            <div class="icon orange px-2">
                                <i class="fa-solid fa-rectangle-list"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Scheduled</h6>
                                <h3 class="text-bold">{{$schedule}} ราย</h3>
                            </div>
                        </div>
                        <div class="right text-end d-flex">
                            <div class="content">
                                <h6 class="mb-10">Reserved</h6>
                                <h3 class="text-bold">{{$reserved}} ราย</h3>
                            </div>
                            <div class="icon info me-0 ms-3 px-2">
                                <i class="fa-solid fa-table-list"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-12">
                    <div class="icon-card mb-20">
                        <div class="icon primary">
                            <i class="fa-solid fa-list-check"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Remain</h6>
                            <h3 class="text-bold">{{$remain}} ราย</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-12">
                    <div class="icon-card mb-20">
                        <div class="icon success">
                            <i class="fa-solid fa-clipboard-check"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Checked out Today</h6>
                            <h3 class="text-bold">{{$checkout}} ราย</h3>
                        </div>
                    </div>
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
<script>
    $(function() {
        $('.dashboard').addClass('active')
    })
</script>
@endsection