@extends('admin.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('js/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
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
        <div class="row align-items-center mb-20">
          <div class="col-md-6">
            <div class="title">
              <h2 class=""><a href=""><small class="text-muted"><i class="fa-solid fa-circle-user"></i> Patient /
                  </small></a> Create Bill</h2>
            </div>
          </div>
          <!-- end col -->
        </div> <!-- end row -->
      </div><!-- title-wrapper -->

      <!-- ========== tables-wrapper start ========== -->
      <div class="row">
        <div class="col-lg-5">
          <div class="card-style mb-30">

            <!-- Card Title -->
            <div class=" title pb-2 mb-2 d-flex justify-content-between align-items-center border-bottom">
              <button class="main-btn danger-btn py-1 px-2">RE0032</button>
              <div class="right">
                <span><a href="">HN000234</a> นายนนทวัฒน์ แสงความสว่าง</span>
                <a href="" class="border-0 bg-transparent">
                  <i class="fa-solid fa-circle-info"></i>
                </a>
              </div>
            </div>

            <!-- Nav Tab -->
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-medicine-tab" data-bs-toggle="tab" data-bs-target="#nav-medicine" type="button" role="tab" aria-controls="nav-medicine" aria-selected="true"><i class="fa-solid fa-syringe"></i> Medicine / Equipment</button>
                <button class="nav-link" id="nav-course-tab" data-bs-toggle="tab" data-bs-target="#nav-course" type="button" role="tab" aria-controls="nav-course" aria-selected="false"><i class="fa-solid fa-wand-magic-sparkles"></i> Course</button>
              </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">

              <!-- Tab1 -->
              <div class="tab-pane fade show active" id="nav-medicine" role="tabpanel" aria-labelledby="nav-medicine-tab">

                <!-- Search -->
                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-floating">
                      <select class="form-select form-select-sm" id="search_category" aria-label="Floating label select example">
                        <option selected value="">All</option>
                        @foreach($medicine_categories AS $medicine_category)
                        <option value="{{$medicine_category->medicine_category_name}}" class="">{{$medicine_category->medicine_category_name}}</option>
                        @endforeach
                      </select>
                      <label for="search_category"><i class="fa-solid fa-circle-check me-1"></i> category</label>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="input-style-3 mb-0">
                      <input type="text" placeholder="Search Name" class="bg-transparent" id="search_name" style="max-height:55px;">
                      <span class="icon"> <i class="fa-solid fa-magnifying-glass me-1"></i></span>
                    </div>
                  </div>

                </div>

                <div class="table-wrapper table-responsive pb-3">
                  <table class="table table-hover" id="table_medicine">
                    <thead>
                      <tr>
                        <th class="text-center">
                          <h6></h6>
                        </th>
                        <th class="text-center">
                          <h6>ID</h6>
                        </th>
                        <th>
                          <h6>Medicine Name</h6>
                        </th>
                        <th>
                          <h6 hidden>Category</h6>
                        </th>
                        <th class="text-end">
                          <h6>Price</h6>
                        </th>
                        <th class="text-end">
                          <h6>Stock</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($medicines as $medicine)
                      <tr>
                        <td class="text-center">
                          <div class="form-check checkbox-style">
                            <input class="form-check-input" type="checkbox" value="" id="">
                          </div>
                        </td>
                        <td class="text-center">{{$medicine->medicine_id}}</td>
                        <td class="ps-2">{{$medicine->medicine_name}}</td>
                        <td class="ps-2" hidden>{{$medicine->medicine_category_name}}</td>
                        <td class="text-end">{{number_format($medicine->medicine_price)}}</td>
                        <td class="text-end pe-1">{{number_format($medicine->medicine_stock)}} {{$medicine->medicine_unit}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- end table -->

              </div> <!-- End tab 1 -->

              <!-- Tab2 -->
              <div class="tab-pane fade" id="nav-course" role="tabpanel" aria-labelledby="nav-course-tab">

                <!-- Search -->
                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-floating">
                      <select class="form-select form-select-sm" id="search_category_course" aria-label="Floating label select example">
                        <option selected value="">All</option>
                        @foreach($course_categories AS $course_category)
                        <option value="{{$course_category->course_category_name}}" class="">{{$course_category->course_category_name}}</option>
                        @endforeach
                      </select>
                      <label for="search_category_course"><i class="fa-solid fa-circle-check me-1"></i> Category</label>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="input-style-3 mb-0">
                      <input type="text" placeholder="Search Name" class="bg-transparent" id="search_name_course" style="max-height:55px;">
                      <span class="icon"> <i class="fa-solid fa-magnifying-glass me-1"></i></span>
                    </div>
                  </div>

                </div>

                <div class="table-wrapper table-responsive pb-3">
                  <table class="table table-hover" id="table_course">
                    <thead>
                      <tr>
                        <th class="text-center">
                          <h6></h6>
                        </th>
                        <th class="text-center">
                          <h6>ID</h6>
                        </th>
                        <th>
                          <h6>Course Name</h6>
                        </th>
                        <th>
                          <h6 hidden>Category</h6>
                        </th>
                        <th class="text-end">
                          <h6>Price</h6>
                        </th>
                        <th class="text-end">
                          <h6>Type</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($courses as $course)
                      <tr>
                        <td class="text-center">
                          <div class="form-check checkbox-style">
                            <input class="form-check-input" type="checkbox" value="" id="">
                          </div>
                        </td>
                        <td class="text-center">{{$course->course_id}}</td>
                        <td class="ps-2">{{$course->course_name}}</td>
                        <td class="ps-2" hidden>{{$course->course_category_name}}</td>
                        <td class="text-end">{{number_format($course->course_total_price)}}</td>
                        <td class="text-end pe-1">{{$course->course_type}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- end table -->

              </div> <!-- End tab 2 -->
            </div> <!-- End tab-content -->

          </div>
        </div>

        <div class="col-lg-7">
          <div class="card-style mb-30">
            
          </div>
        </div>
      </div>
      <!-- ========== tables-wrapper end ========== -->
    </div><!-- end container-fluid -->
  </section>
  <!-- ========== section end ========== -->

  <!-- Footer -->
  @include('admin.components.footer')
</main>
<!-- ======== main-wrapper end =========== -->


@endsection
@section('script')
<script src="{{ asset('js/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('js/cleave.js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('js/admin/bill/bill.js') }}"></script>
@endsection