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
              <h2 class=""><a href=""><i class="fa-solid fa-clipboard-list"></i> Appointments</a></h2>
            </div>
          </div>
          <!-- end col -->
          <div class="col-md-6 text-end">
            <a href="#!" class="main-btn primary-btn btn-hover btn-sm" data-bs-toggle="modal" data-bs-target="#modal_create">
              <i class="fa-solid fa-calendar-plus"></i> Create Appointment
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

                </div>
              </form>

              <!-- Table  -->
              <div class="table-wrapper table-responsive pb-3">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 10%;">
                        <h6>ID.</h6>
                      </th>
                      <th>
                        <h6>Doctor</h6>
                      </th>
                      <th>
                        <h6>Patient</h6>
                      </th>
                      <th>
                        <h6>Date</h6>
                      </th>
                      <th>
                        <h6>Time</h6>
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
                    @foreach($appointments as $appointment)
                    <tr>
                      <td class="text-center"><a href="" class="text-primary appointment_id">{{$appointment->appointment_number}}</a></td>
                      <td class="ps-2 appointment_name">{{$appointment->doctor_title}} {{$appointment->doctor_fname}} {{$appointment->doctor_lname}}</td>
                      <td class="appointment_email">{{$appointment->patient_title}} {{$appointment->patient_fname}} {{$appointment->patient_lname}}</td>
                      <td class="appointment_role">{{$appointment->appointment_date}}</td>
                      <td class="appointment_role">{{$appointment->appointment_time}}</td>
                      <td class="appointment_status">
                        @switch($appointment->appointment_status)
                        @case('0')
                        <a href="#!" class="label-icon warning rounded-pill text-capitalize"><i class="fa-solid fa-list me-1"></i> Appointment</a>
                        @break
                        @case('1')
                        <a href="#!" class="label-icon sky rounded-pill text-capitalize"><i class="fa-solid fa-flag-checkered me-1"></i> Arrived</a>
                        @break
                        @case('2')
                        <a href="#!" class="label-icon orange rounded-pill text-capitalize"><i class="fa-solid fa-hourglass-start me-1"></i> Pending</a>
                        @break
                        @case('3')
                        <a href="#!" class="label-icon success rounded-pill text-capitalize"><i class="fa-solid fa-circle-check me-1"></i> Completed</a>
                        @break
                        @case('4')
                        <a href="#!" class="label-icon red rounded-pill text-capitalize"><i class="fa-solid fa-xmark me-1"></i> Cancel</a>
                        @break
                        @endswitch
                      </td>
                      <td class="text-start d-flex align-items-center">
                        <a href="#" class="main-btn primary-btn p-1 me-3" data-bs-dismiss="modal">
                        <i class="fa-solid fa-check"></i> Check
                        </a>
                        <div class="dropdown">
                          <a class="text-muted dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                          </a>

                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#!" data-id="{{$appointment->appointment_id}}"><i class="fa-solid fa-eye"></i> View</a>
                            <li><a class="dropdown-item" href="#!" data-id="{{$appointment->appointment_id}}"><i class="fa-solid fa-print"></i> Print</a>
                            <li><a class="dropdown-item btn-edit" href="#!" data-id="{{$appointment->appointment_id}}" data-bs-toggle="modal" data-bs-target="#modal_update"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            </li>
                            <li><a class="dropdown-item btn-delete" href="#!" data-id="{{$appointment->appointment_id}}" data-bs-toggle="modal" data-bs-target="#modal_delete"><i class="fa-solid fa-xmark"></i> Cancel</a></li>
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
        <form action="{{ route('admin.appointment.delete') }}" method="post">
          @csrf
          @method('delete')
          <div class="modal-body">
            <div class="image mb-30">
              <i class="fa-solid fa-trash" style="font-size: 72px;"></i>
            </div>
            <div class="content mb-30">
              <h2 class="mb-15">Cancel Appointment</h2>
              <p class="text-sm text-medium">
                Are you sure you want Cancel Appointment ?
                <input type="hidden" name="appointment_id" id="delete_appointment_id" value="">
              </p>
            </div>
            <div class="action d-flex flex-wrap justify-content-center">
              <a class="main-btn deactive-btn rounded-md square-btn btn-hover m-1 " data-bs-dismiss="modal">
                Cancel
              </a>
              <button class="main-btn danger-btn rounded-md square-btn btn-hover m-1" type="submit" class="btn btn-primary">Yes Cancel!</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal create-->
<div class="follow-up-modal">
  <div class="modal fade" id="modal_create" tabindex="-1" aria-labelledby="modal_createLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content card-style">
        <form action="{{ route('admin.appointment.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-header px-0 border-0">
            <h3 class="text-bold"><i class="fa-solid fa-calendar-plus"></i> Create appointment</h3>
            <button class="border-0 bg-transparent h1" data-bs-dismiss="modal">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">

              <div class="col-sm-6">
                <div class="select-style-1">
                  <label>Doctor <span class="text-danger">*</span> </label>
                  <div class="select-position">
                    <select class="light-bg" required="required" name="role" id="role_select" style="width: 100%;">
                      <option value="admin">kong nontawat</option>
                    </select>
                    @error('role')
                    <small class="text-danger">
                      {{ $message }}
                    </small>
                    @enderror
                  </div>
                </div>
                <!-- end select -->
              </div>
              <!-- end col -->

              <div class="col-sm-6">
                <div class="select-style-1">
                  <label>Patient <span class="text-danger">*</span> </label>
                  <div class="select-position">
                    <select class="light-bg" required="required" name="role" id="role_select" style="width: 100%;">
                      <option value="admin">Genji sang</option>
                    </select>
                    @error('role')
                    <small class="text-danger">
                      {{ $message }}
                    </small>
                    @enderror
                  </div>
                </div>
                <!-- end select -->
              </div>
              <!-- end col -->


              <div class="col-sm-6">
                <div class="input-style-1">
                  <label><i class="fa-solid fa-calendar-days"></i> Date <span class="text-danger">*</span> </label>
                  <input type="date" required="required" id="date" name="birthdate" value="{{old('birthdate')}}">
                  @error('birthdate')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->


              <div class="col-sm-6">
                <div class="input-style-1">
                  <label><i class="fa-solid fa-clock"></i> Time <span class="text-danger">*</span> </label>
                  <input type="date" required="required" id="time" name="birthdate" value="{{old('birthdate')}}">
                  @error('birthdate')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-12">
                <div class="input-style-1">
                  <label> Reason for Appointment <span class="text-danger">*</span> </label>
                  <textarea rows="4" cols="30" value="{{old('name')}}" name="name" required="required" data-parsley-maxlength="100" class="form-control" placeholder="Please enter your First Name" autocomplete="off"></textarea>
                  @error('name')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-12">
                <div class="input-style-1">
                  <label> Doctor Comment</label>
                  <textarea rows="4" cols="30" id="note_editor" value="{{old('name')}}" name="name" required="required" data-parsley-maxlength="100" class="form-control" placeholder="Please enter your First Name" autocomplete="off"></textarea>
                  @error('name')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

            </div>
            <div class="action mt-4">
              <div class="btn-group d-flex flex-wrap align-items-end justify-content-between">
                <div class="left">
                  <a href="#" class="main-btn danger-btn p-2 mx-2 mb-3" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i> Cancel
                  </a>
                  <button type="reset" class="main-btn light-btn p-2 mx-2 mb-3">
                    <i class="fa-solid fa-arrow-rotate-left"></i> Reset
                  </button>
                </div>
                <div class="right">
                  <button type="submit" class="main-btn primary-btn btn-hover mx-2 mb-3">
                    <i class="fa-solid fa-floppy-disk"></i> Submit
                  </button>
                </div>
              </div>
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
<script src="{{ asset('js/ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('js/admin/appointment/appointment.js') }}"></script>
@endsection