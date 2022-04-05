@extends('admin.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('js/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/flatpickr/dist/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/appointment.css') }}">


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
                      <th hidden class="d-none"></th>
                      <th hidden class="d-none"></th>
                      <th hidden class="d-none"></th>
                      <th hidden class="d-none"></th>
                    </tr>
                    <!-- end table row-->
                  </thead>
                  <tbody>
                    @foreach($appointments as $appointment)
                    <tr>
                      <td class="text-center"><a href="" class="text-primary appointment_id">{{$appointment->appointment_number}}</a></td>
                      <td class="ps-2 appointment_name">{{$appointment->doctor_title}} {{$appointment->doctor_fname}} {{$appointment->doctor_lname}}</td>
                      <td class="">{{$appointment->patient_title}} {{$appointment->patient_fname}} {{$appointment->patient_lname}}</td>
                      <td class="appointment_date">{{$appointment->appointment_date}}</td>
                      <td class="appointment_time">{{$appointment->appointment_time}}</td>
                      <td class="appointment_status">
                        @switch($appointment->appointment_status)
                        @case('0')
                        <a href="{{route('admin.appointment.change_status',$appointment->appointment_id)}}" data-id="{{$appointment->appointment_status}}" class="label-icon warning rounded-pill text-capitalize"><i class="fa-solid fa-list me-1"></i> Appointment</a>
                        @break
                        @case('1')
                        <a href="{{route('admin.appointment.change_status',$appointment->appointment_id)}}" data-id="{{$appointment->appointment_status}}" class="label-icon sky rounded-pill text-capitalize"><i class="fa-solid fa-flag-checkered me-1"></i> Arrived</a>
                        @break
                        @case('2')
                        <a href="{{route('admin.appointment.change_status',$appointment->appointment_id)}}" data-id="{{$appointment->appointment_status}}" class="label-icon orange rounded-pill text-capitalize"><i class="fa-solid fa-hourglass-start me-1"></i> Pending</a>
                        @break
                        @case('3')
                        <a href="#!" data-id="{{$appointment->appointment_status}}" class="label-icon success rounded-pill text-capitalize"><i class="fa-solid fa-circle-check me-1"></i> Completed</a>
                        @break
                        @case('4')
                        <a href="#!" data-id="{{$appointment->appointment_status}}" class="label-icon red rounded-pill text-capitalize"><i class="fa-solid fa-xmark me-1"></i> Cancel</a>
                        @break
                        @endswitch
                      </td>
                      <td class="text-start d-flex align-items-center">
                        <a href="{{route('admin.appointment.change_status',$appointment->appointment_id)}}" class="main-btn primary-btn p-1 me-3">
                          <i class="fa-solid fa-check"></i> Check
                        </a>
                        <div class="dropdown">
                          <a class="text-muted dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                          </a>

                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item btn-view" href="#" data-id="{{$appointment->appointment_id}}"><i class="fa-solid fa-eye"></i> View</a>
                            <li><a class="dropdown-item" href="{{route('admin.appointment.print',$appointment->appointment_id)}}" ><i class="fa-solid fa-print"></i> Print</a>
                            <li><a class="dropdown-item btn-edit" href="#" data-id="{{$appointment->appointment_id}}" data-bs-toggle="modal" data-bs-target="#modal_update"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            </li>
                            <li><a class="dropdown-item btn-cancel" href="#" data-id="{{$appointment->appointment_id}}" data-bs-toggle="modal" data-bs-target="#modal_cancel"><i class="fa-solid fa-calendar-xmark"></i> Cancel</a></li>
                          </ul>
                        </div>
                      </td>
                      <td hidden class="d-none reason_for_appointment">{{$appointment->reason_for_appointment}}</td>
                      <td hidden class="d-none doctor_comment">{{$appointment->doctor_comment}}</td>
                      <td hidden class="d-none doctor_id">{{$appointment->doctor_id}}</td>
                      <td hidden class="d-none patient_id">{{$appointment->patient_id}}</td>
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
<!-- Modal cancel-->
<div class="follow-up-modal">
  <div class="modal fade" id="modal_cancel" tabindex="-1" aria-labelledby="modal_cancelLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content card-style text-center">
        <form action="{{ route('admin.appointment.cancel') }}" method="post">
          @csrf
          @method('put')
          <div class="modal-body">
            <div class="image mb-30">
              <i class="fa-solid fa-calendar-xmark" style="font-size: 72px;"></i>
            </div>
            <div class="content mb-30">
              <h2 class="mb-15">Cancel Appointment</h2>
              <p class="text-sm text-medium">
                Are you sure you want Cancel Appointment ?
                <input type="hidden" name="appointment_id" id="appointment_id" value="">
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
  <div class="modal fade" id="modal_create" aria-labelledby="modal_createLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content card-style">
        <form action="{{ route('admin.appointment.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('post')
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
                    <select class="light-bg" required="required" name="doctor_id" id="doctor_id" style="width: 100%;">
                      <option disabled selected>Please select doctor</option>
                      @foreach($doctors AS $doctor)
                      <option value="{{$doctor->doctor_id}}">{{$doctor->title}} {{$doctor->fname}} {{$doctor->lname}}</option>
                      @endforeach
                    </select>
                    @error('doctor_id')
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
                    <select class="light-bg" required="required" name="patient_id" id="patient_id" style="width: 100%;">
                      <option disabled selected>Please select patient</option>
                      @foreach($patients AS $patient)
                      <option value="{{$patient->patient_id}}">{{$patient->title}} {{$patient->fname}} {{$patient->lname}}</option>
                      @endforeach
                    </select>
                    @error('patient_id')
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
                  <input type="date" required="required" id="date" name="appointment_date" value="{{old('appointment_date')}}">
                  @error('appointment_date')
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
                  <input type="date" required="required" id="time" name="appointment_time" value="{{old('appointment_time')}}">
                  @error('appointment_time')
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
                  <textarea rows="4" cols="30" name="reason_for_appointment" required="required" data-parsley-maxlength="100" class="form-control" placeholder="Please enter your First Name"></textarea>
                  @error('reason_for_appointment')
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
                  <textarea rows="4" cols="30" id="doctor_comment" name="doctor_comment" data-parsley-maxlength="100" class="form-control" placeholder="Please enter your First Name"></textarea>
                  @error('doctor_comment')
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

<!-- Modal update-->
<div class="follow-up-modal">
  <div class="modal fade" id="modal_update" aria-labelledby="modal_updateLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content card-style">
        <form action="{{ route('admin.appointment.update') }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <input type="hidden" name="appointment_id" id="e_appointment_id">
          <div class="modal-header px-0 border-0">
            <h3 class="text-bold"><i class="fa-solid fa-calendar-days"></i> Edit Appointment</h3>
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
                    <select class="light-bg" required="required" name="doctor_id" id="e_doctor_id" style="width: 100%;">
                      <option disabled>Please select doctor</option>
                      @foreach($doctors AS $doctor)
                      <option value="{{$doctor->doctor_id}}">{{$doctor->title}} {{$doctor->fname}} {{$doctor->lname}}</option>
                      @endforeach
                    </select>
                    @error('doctor_id')
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
                    <select class="light-bg" required="required" name="patient_id" id="e_patient_id" style="width: 100%;">
                      <option disabled>Please select patient</option>
                      @foreach($patients AS $patient)
                      <option value="{{$patient->patient_id}}">{{$patient->title}} {{$patient->fname}} {{$patient->lname}}</option>
                      @endforeach
                    </select>
                    @error('patient_id')
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
                  <input type="date" required="required" class="e_appointment_date" id="e_appointment_date" name="appointment_date" value="{{old('appointment_date')}}">
                  @error('appointment_date')
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
                  <input type="date" required="required" class="e_appointment_time" id="e_appointment_time" name="appointment_time" value="{{old('appointment_time')}}">
                  @error('appointment_time')
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
                  <textarea rows="4" cols="30" name="reason_for_appointment" required="required" class="form-control e_reason_for_appointment" placeholder="Please enter your First Name"></textarea>
                  @error('reason_for_appointment')
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
                  <textarea rows="4" cols="30" id="e_doctor_comment" name="doctor_comment" class="form-control e_doctor_comment" placeholder="Please enter your First Name"></textarea>
                  @error('doctor_comment')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6">
                <div class="select-style-1">
                  <label>Status <span class="text-danger">*</span> </label>
                  <div class="select-position">
                    <select class="light-bg" required="required" name="appointment_status" id="e_appointment_status" style="width: 100%;">
                      <option value="0">Appointment</option>
                      <option value="1">Arrived</option>
                      <option value="2">Pending</option>
                      <option value="3">Completed</option>
                      <option value="4">Cancel</option>
                    </select>
                    @error('appointment_status')
                    <small class="text-danger">
                      {{ $message }}
                    </small>
                    @enderror
                  </div>
                </div>
                <!-- end select -->
              </div>
              <!-- end col -->

            </div>
            <div class="action mt-4">
              <div class="btn-group d-flex flex-wrap align-items-end justify-content-between">
                <div class="left">
                  <a href="#" class="main-btn danger-btn p-2 mx-2 mb-3" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i> Cancel
                  </a>
                </div>
                <div class="right">
                  <button type="submit" class="main-btn primary-btn btn-hover mx-2 mb-3">
                    <i class="fa-solid fa-floppy-disk"></i> Save Change
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

<!-- Modal View-->
<div class="follow-up-modal">
  <div class="modal fade" id="modal_detail" aria-labelledby="modal_detailLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
      <div class="modal-content card-style">
        <div class="modal-header px-0 border-0">
          <h3 class="text-bold"><i class="fa-solid fa-clipboard-list"></i> Appointment Details</h3>
          <button class="border-0 bg-transparent h1" data-bs-dismiss="modal">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
        <hr class="m-0">
        <div class="modal-body" style="font-family: Arial, Helvetica, sans-serif;">
          <div class="head-top d-flex flex-wrap flex-lg-nowrap">
            <div class="logo me-4 mt-2">
              <img src="{{asset('image/LogoBeautyCare.png')}}" alt="" width="220">
            </div>
            <div class="clinic-info mt-2 w-100">
              <h4>คลินิคเสริมความงาม บิวตี้แคร์</h4>
              <h5>Beauty Care Clinic</h5>
              <p>โครงการตลาดจอมพล Overflow เลขที่ 555/49 ถนนกสิกรทุ่งสร้าง ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000 โทร 064-487-0915</p>
              <hr class="my-2">
            </div>
          </div>

          <div class="head">
            <h3 class="text-center mb-3">บัตรนัด</h3>
          </div>

          <div class="body" style="font-size: 18px;">
            <div class="row justify-content-between">
              <div class="col-sm-6 col-lg-5">
                <span class="fw-bold my-1">ชื่อ-นามสกุล : </span> <span class="show_patient_name"></span> <br>
                <span class="fw-bold my-1">รหัส : </span> <span class="show_patient_opd"></span> <br>
                <span class="fw-bold my-1">อายุ : </span> <span class="show_patient_age"></span> <br>
                <span class="fw-bold my-1">เบอร์โทร : </span> <span class="show_patient_phone"></span> <br>
                <span class="fw-bold my-1">โรคประจำตัว : </span> <span class="show_patient_congenital_disease"></span> <br>
                <span class="fw-bold my-1">แพ้ยา : </span> <span class="show_patient_drug_allergies"></span> <br>
              </div>
              <div class="col-sm-6 col-lg-5">
                <span class="fw-bold my-1">ใบนัดหมายเลข : </span> <span class="show_appointment_number">></span> <br>
                <span class="fw-bold my-1">วันที่นัด : </span> <span class="show_appointment_date"></span> <br>
                <span class="fw-bold my-1">เวลาที่นัด : </span> <span class="show_appointment_time"></span> <br>
                <span class="fw-bold my-1">แพทย์ผู้นัด : </span> <span class="show_doctor_name"></span> <br>
                <span class="fw-bold my-1">ติดต่อ : </span> <span> 064-487-0915</span> <br>
              </div>
            </div>

            <p class="mt-4 fs-5 fw-bold">สาเหตุที่นัด : <span class="show_reason_for_appointment fw-light"> -</span></p>

            <p class="mt-4 fs-5 fw-bold">หมายเหตุ : <span class="show_doctor_comment"> -</span></p>

            <p class="text-end mt-4">ออกใบนัดวันที่ : <span class="show_created_at"></span></p>
          </div>
        </div>
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
<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('js/admin/appointment/appointment.js') }}"></script>
@endsection