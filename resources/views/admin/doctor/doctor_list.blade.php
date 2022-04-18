@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('js/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/flatpickr/dist/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/datatables.net/dataTables.dateTime.min.css') }}">

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
              <h2 class=""><a href=""><i class="fa-solid fa-user-doctor"></i> Doctors</a></h2>
            </div>
          </div>
          <!-- end col -->
          <div class="col-md-6 text-end">
            <a href="{{route('admin.doctor.add')}}" class="main-btn primary-btn btn-hover btn-sm">
              <i class="fa-solid fa-plus mr-5"></i> Add new Doctor
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

                  <div class="col-sm-6 col-md-4">
                    <div class="input-style-3 mb-0">
                      <input type="text" placeholder="Search Name" class="bg-transparent" id="search_name">
                      <span class="icon"> <i class="fa-solid fa-magnifying-glass me-1"></i></span>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="input-style-3 mb-0">
                      <input type="text" placeholder="Search Position" class="bg-transparent" id="search_position">
                      <span class="icon"> <i class="fa-solid fa-users-rectangle me-1"></i></i></span>
                    </div>
                  </div>

                  
                  <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="form-floating">
                      <select class="form-select" id="search_status" aria-label="Floating label select example">
                        <option selected value="">All</option>
                        <option value="active" class="text-success">Active</option>
                        <option value="Inactive" class="text-danger">Inactive</option>
                      </select>
                      <label for="search_status"><i class="fa-solid fa-circle-check me-1"></i> Patent Status</label>
                    </div>
                  </div>


                </div>
              </form>

              <!-- Table  -->
              <div class="table-wrapper table-responsive pb-3">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 5%;">
                        <h6>ID.</h6>
                      </th>
                      <th style="width: 10%;">
                        <h6></h6>
                      </th>
                      <th>
                        <h6>Name</h6>
                      </th>
                      <th>
                        <h6>Phone</h6>
                      </th>
                      <th>
                        <h6>Email</h6>
                      </th>
                      <th>
                        <h6>Position</h6>
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
                    @foreach($doctors as $doctor)
                    <tr class="{{($doctor->doctor_status == 0)?'table-danger':''}}">
                      <td class="text-center"><a href="{{route('admin.doctor.detail',$doctor->doctor_id)}}" class="text-primary">{{$doctor->doctor_id}}</a></td>
                      <td class="text-center"><img src="{{url('image/uploads/',$doctor->image)}}" class="" alt="" style="max-height: 100px;object-fit:cover;"></td>
                      <td class="ps-2">{{$doctor->title}} {{$doctor->fname}} {{$doctor->lname}}</td>
                      <td>
                      {{$doctor->phone}}
                      </td>
                      <td>{{$doctor->email}}</td>
                      <td>{{$doctor->position}}</td>
                      <td>
                        @if($doctor->doctor_status == 1)
                        <a href="{{route('admin.doctor.change_status',$doctor->doctor_id)}}" class="label-icon success rounded-pill text-capitalize"><i class="fa-solid fa-check"></i> Active</a>
                        @else
                        <a href="{{route('admin.doctor.change_status',$doctor->doctor_id)}}" class="label-icon red rounded-pill text-capitalize"><i class="fa-solid fa-xmark"></i> Inactive</a>
                        @endif
                      </td>
                      <td class="text-center">
                        <div class="dropdown dropstart">
                          <a class="text-muted dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                          </a>

                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('admin.doctor.detail',$doctor->doctor_id)}}"><i class="fa-solid fa-eye"></i> View</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            </li>
                            <li><a class="dropdown-item btn-delete" href="#!" data-id="{{$doctor->doctor_id}}" data-bs-toggle="modal" data-bs-target="#modal_delete"><i class="fa-solid fa-trash"></i> Delete</a></li>

                          </ul>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                    <!-- ========== header end ========== -->
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
      <!-- <div class="card-style">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <span class="me-1"><i class="fa-solid fa-file-export"></i> Export To : </span>
            <div class="btn-group" role="group" aria-label="Basic outlined example">
              <button type="button" class="main-btn light-btn-outline square-btn btn-hover py-1 px-3"><i class="fa-solid fa-file-excel"></i> Excel</button>
              <button type="button" class="main-btn light-btn-outline square-btn btn-hover py-1 px-3"><i class="fa-solid fa-file-pdf"></i> PDF</button>
              <button type="button" class="main-btn light-btn-outline square-btn btn-hover py-1 px-3"><i class="fa-solid fa-file-csv"></i> CSV</button>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <span class="me-1"><i class="fa-solid fa-print"></i> Print To : </span>
            <div class="btn-group" role="group" aria-label="Basic outlined example">
              <button type="button" class="main-btn light-btn-outline square-btn btn-hover py-1 px-3"><i class="fa-solid fa-print"></i> Print A4</button>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <span class="me-1"><i class="fa-solid fa-file-import"></i> Import From : </span>
            <div class="btn-group" role="group" aria-label="Basic outlined example">
              <button type="button" class="main-btn light-btn-outline square-btn btn-hover py-1 px-3"><i class="fa-solid fa-file-excel"></i> Excel</button>
              <button type="button" class="main-btn light-btn-outline square-btn btn-hover py-1 px-3"><i class="fa-solid fa-file-csv"></i> CSV</button>
              <button type="button" class="main-btn light-btn-outline square-btn btn-hover py-1 px-3"><i class="fa-solid fa-j"></i> JSON</button>
              <button type="button" class="main-btn light-btn-outline square-btn btn-hover py-1 px-3"><i class="fa-solid fa-database"></i> SQL</button>
            </div>
          </div>
        </div>
      </div> -->

    </div><!-- end container-fluid -->
  </section>
  <!-- ========== section end ========== -->

  <!-- Footer -->
  @include('admin.components.footer')
</main>
<!-- ======== main-wrapper end =========== -->
<!-- Modal Delete-->
<div class="follow-up-modal">
  <div class="modal fade" id="modal_delete" tabindex="-1" aria-labelledby="modal_deleteLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content card-style text-center">
        <form action="{{ route('admin.doctor.delete') }}" method="post">
          @csrf
          @method('delete')
          <div class="modal-body">
            <div class="image mb-30">
              <i class="fa-solid fa-trash" style="font-size: 72px;"></i>
            </div>
            <div class="content mb-30">
              <h2 class="mb-15">Delete Account</h2>
              <p class="text-sm text-medium">
                Are you sure you want delete Account ?
                <input type="hidden" name="doctor_id" id="delete_doctor_id" value="">
              </p>
            </div>
            <div class="action d-flex flex-wrap justify-content-center">
              <a class="main-btn deactive-btn rounded-md square-btn btn-hover m-1 " data-bs-dismiss="modal">
                Cancel
              </a>
              <button class="main-btn danger-btn rounded-md square-btn btn-hover m-1" type="submit" class="btn btn-primary">Yes Deleted!</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('js/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('js/cleave.js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('js/admin/doctor/doctor.js') }}"></script>
@endsection