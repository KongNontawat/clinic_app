@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('js/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/flatpickr/dist/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/datatables.net/dataTables.dateTime.min.css') }}">

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
        <div class="row align-items-center mb-20">
          <div class="col-md-6">
            <div class="title">
              <h2 class=""><a href=""><i class="fa-solid fa-users"></i> Patients</a></h2>
            </div>
          </div>
          <!-- end col -->
          <div class="col-md-6 text-end">
            <a href="{{route('admin.patient.add')}}" class="main-btn primary-btn btn-hover btn-sm">
                <i class="fa-solid fa-plus mr-5"></i> Add new Patient
            </a>
          </div><!-- end col -->
        </div> <!-- end row -->
      </div><!-- title-wrapper -->

      <!-- ========== tables-wrapper start ========== -->
      <div class="tables-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-style mb-3">
              <form action="" class="mb-4">
                <div class="row gy-3 gx-2">

                  <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="input-style-3 mb-0">
                      <input type="text" placeholder="Search Name" class="bg-transparent" id="search_name">
                      <span class="icon"> <i class="fa-solid fa-magnifying-glass me-1"></i></span>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="input-style-3 mb-0">
                      <input type="text" placeholder="ID Card Number" class="bg-transparent" id="search_idcard">
                      <span class="icon"><i class="fa-solid fa-magnifying-glass-plus me-1"></i></span>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="form-floating">
                      <select class="form-select" id="search_group" aria-label="Floating label select example">
                        <option selected value="">All</option>
                        <option value="vip">VIP</option>
                        <option value="vip 2">VIP 2</option>
                        <option value="old member">Old Member</option>
                        <option value="normal">Normal</option>
                        <option value="new member">New Member</option>
                      </select>
                      <label for="search_group"><i class="fa-solid fa-elevator me-1"></i> Member Group</label>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="form-floating">
                      <select class="form-select" id="search_status" aria-label="Floating label select example">
                        <option selected value="">All</option>
                        <option value="normal" class="text-success">Normal</option>
                        <option value="abnormal" class="text-danger">Abnormal</option>
                      </select>
                      <label for="search_status"><i class="fa-solid fa-circle-check me-1"></i> Patent Status</label>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4 col-xl-2" style="max-width: 210px;">
                    <div class="form-floating">
                      <input type="text" id="min" name="min" class="form-control bg-transparent">
                      <label for="floatingSelect"><i class="fa-solid fa-clock me-1"></i> Start Date</label>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4 col-xl-2" style="max-width: 210px;">
                    <div class="form-floating">
                      <input type="text" id="max" name="max" class="form-control bg-transparent">
                      <label for="floatingSelect"><i class="fa-solid fa-clock"></i> End Date</label>
                    </div>
                  </div>

                  <!-- <div class="col-sm-6 col-md-4 col-xl-2 text-end">
                    <a href="#!" class="main-btn light-btn btn-hover border col-12">
                      <i class="fa-solid fa-magnifying-glass mr-5"></i> Search
                    </a>
                  </div> -->

                </div>
              </form>

              <!-- Table  -->
              <div class="table-wrapper table-responsive pb-3">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="text-center">
                        <h6>ID.</h6>
                      </th>
                      <th>
                        <h6>Name</h6>
                      </th>
                      <th>
                        <h6>ID Card</h6>
                      </th>
                      <th>
                        <h6>Sex</h6>
                      </th>
                      <th>
                        <h6>Age</h6>
                      </th>
                      <th>
                        <h6>Phone</h6>
                      </th>
                      <th>
                        <h6>Line</h6>
                      </th>
                      <th>
                        <h6>Group</h6>
                      </th>
                      <th>
                        <h6>Created_at</h6>
                      </th>
                      <th>
                        <h6>Status</h6>
                      </th>
                      <th>
                        <h6>Action</h6>
                      </th>
                    </tr>
                    <!-- end table row-->
                  </thead>
                  <tbody>
                    @foreach($patients AS $patient)
                    <tr>
                      <td><a href="{{route('admin.patient.detail')}}" class="text-primary">{{$patient->opd_id}}</a> </td>
                      <td>{{$patient->title}} {{$patient->fname}} {{$patient->lname}}</td>
                      <td>{{$patient->id_card}}</td>
                      <td>
                        @if($patient->sex == 'male')
                        <div class="label-icon sky text-capitalize">
                          <i class="fa-solid fa-mars me-1"></i> {{$patient->sex}} 
                        </div>
                        @else
                        <div class="label-icon orange text-capitalize">
                          <i class="fa-solid fa-venus me-1"></i> {{$patient->sex}} 
                        </div>
                        @endif
                      </td>
                      <td class="ps-2">{{\Carbon\Carbon::parse($patient->birthdate)->diff(\Carbon\Carbon ::now())->y}}</td>
                      <!-- <td>{{substr($patient->phone,0,3)}}-{{substr($patient->phone,3,3)}}-{{substr($patient->phone,6)}}</td> -->
                      <td>{{$patient->phone}}</td>
                      <td>
                        @if($patient->id_line == null)
                        <i class="fa-solid fa-triangle-exclamation fs-5 text-warning"></i>
                        @else 
                        <i class="fa-solid fa-check fs-5 text-success"></i>
                        @endif
                      </td>
                      <td class="text-success text-capitalize" >{{$patient->group_name}}</td>
                      <td>{{\Carbon\Carbon::parse($patient->created_at)->format('d-m-Y')}}</td>
                      <td>
                        @if($patient->patient_status == 1)
                        <a href="#!" class="label-icon success rounded-pill text-capitalize"><i
                            class="fa-solid fa-check"></i> Normal</a>
                        @else 
                        <a href="#!" class="label-icon red rounded-pill text-capitalize"><i
                            class="fa-solid fa-xmark"></i> Abnormal</a>
                        @endif
                      </td>
                      <td class="text-center">
                        <div class="dropdown dropstart">
                          <a class="text-muted dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                          </a>

                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i> View</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-trash"></i> Delete</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- end table -->
              </div>
            </div>
            <!-- end card -->
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- ========== tables-wrapper end ========== -->

      <!-- Import And Export -->
      <div class="card-style">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <span class="me-1"><i class="fa-solid fa-file-export"></i> Export To : </span>
            <div class="btn-group" role="group" aria-label="Basic outlined example">
              <button type="button" class="main-btn light-btn-outline square-btn btn-hover py-1 px-3"><i
                  class="fa-solid fa-file-excel"></i> Excel</button>
              <button type="button" class="main-btn light-btn-outline square-btn btn-hover py-1 px-3"><i
                  class="fa-solid fa-file-pdf"></i> PDF</button>
              <button type="button" class="main-btn light-btn-outline square-btn btn-hover py-1 px-3"><i
                  class="fa-solid fa-file-csv"></i> CSV</button>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <span class="me-1"><i class="fa-solid fa-print"></i> Print To : </span>
            <div class="btn-group" role="group" aria-label="Basic outlined example">
              <button type="button" class="main-btn light-btn-outline square-btn btn-hover py-1 px-3"><i
                  class="fa-solid fa-print"></i> Print A4</button>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <span class="me-1"><i class="fa-solid fa-file-import"></i> Import From : </span>
            <div class="btn-group" role="group" aria-label="Basic outlined example">
              <button type="button" class="main-btn light-btn-outline square-btn btn-hover py-1 px-3"><i
                  class="fa-solid fa-file-excel"></i> Excel</button>
              <button type="button" class="main-btn light-btn-outline square-btn btn-hover py-1 px-3"><i
                  class="fa-solid fa-file-csv"></i> CSV</button>
              <button type="button" class="main-btn light-btn-outline square-btn btn-hover py-1 px-3"><i
                  class="fa-solid fa-j"></i> JSON</button>
              <button type="button" class="main-btn light-btn-outline square-btn btn-hover py-1 px-3"><i
                  class="fa-solid fa-database"></i> SQL</button>
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
<script src="{{ asset('js/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('js/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('js/cleave.js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('js/admin/patient/patient.js') }}"></script>
@endsection