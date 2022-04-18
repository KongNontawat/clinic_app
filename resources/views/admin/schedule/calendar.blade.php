@extends('admin.layouts.app')

@section('style')
<!-- <link rel="stylesheet" href="{{ asset('js/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}"> -->
<link rel="stylesheet" href="{{ asset('js/flatpickr/dist/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/fullcalendar/main.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/calendar.css') }}">
<style>

</style>
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
              <h2 class=""><a href=""><i class="fa-solid fa-calendar-days"></i> Schedule Calender</a></h2>
            </div>
          </div>
          <!-- end col -->
          <div class="col-md-6 text-end">
            <a href="#!" class="main-btn primary-btn btn-hover btn-sm" data-bs-toggle="modal" data-bs-target="#modal_create">
              <i class="fa-solid fa-calendar-plus"></i> Create Appointment
            </a>
          </div>
        </div> <!-- end row -->
      </div><!-- title-wrapper -->

      <div class="row">
        <div class="col-md-6 col-lg-3">
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
        <div class="col-md-6 col-lg-3">
          <div class="icon-card mb-20 d-flex justify-content-between">
            <div class="left d-flex">
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
        <div class="col-md-6 col-lg-3">
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
        <div class="col-md-6 col-lg-3">
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

      <!-- ========== tables-wrapper start ========== -->
      <div class="tables-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-style calendar-card mb-3">
              <!-- <form action="" class="mb-4">
                <div class="row gy-3 gx-2">

                  <div class="col-sm-6 col-md-4">
                    <div class="input-style-3 mb-0">
                      <input type="text" placeholder="Search Name" class="bg-transparent" id="search_name">
                      <span class="icon"> <i class="fa-solid fa-magnifying-glass me-1"></i></span>
                    </div>
                  </div>

                </div>
              </form> -->
              <div id="calendar"></div>
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
                      <option value="{{$doctor->doctor_id}}" {{(old('doctor_id') == $doctor->doctor_id)? 'selected':''}}>{{$doctor->title}} {{$doctor->fname}} {{$doctor->lname}}</option>
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
                      <option value="{{$patient->patient_id}}" {{(old('patient_id') == $patient->patient_id)? 'selected':''}}>[{{$patient->opd_id}}] {{$patient->title}} {{$patient->fname}} {{$patient->lname}}</option>
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
                  <textarea rows="4" cols="30" name="reason_for_appointment" required="required" class="form-control" placeholder="Please enter your First Name">{{old('reason_for_appointment')}}</textarea>
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
                  <textarea rows="4" cols="30" id="doctor_comment" name="doctor_comment" class="form-control" placeholder="Please enter your First Name">{{old('doctor_comment')}}</textarea>
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

@endsection
@section('script')
<script src="{{ asset('js/fullcalendar/main.min.js') }}"></script>
<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('js/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('js/ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('js/admin/schedule/calendar.js') }}"></script>
<script>
  $(function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      timeZone: 'Asia/Bangkok',
      dayMaxEventRows: true,
      contentHeight: 700,
      slotLabelFormat: {
        hour: '2-digit',
        minute: '2-digit',
        meridiem: false,
        hour12: false
      },
      headerToolbar: {
        left: 'prev,next,today',
        center: 'title',
        right: 'timeGridWeek,dayGridMonth'
      },
      // views: {
      //   dayGridMonth: {
      //     dayMaxEventRows: 4 // adjust to 6 only for timeGridWeek/timeGridDay
      //   }
      // },
      events: "{{url('admin/schedule/get_schedule')}}",
      eventTimeFormat: {
        hour: '2-digit',
        minute: '2-digit',
        hour12: false
      },
      eventClick: function(info) {
        $('#modal_detail').modal('show');
        $.ajax({
          method: 'get',
          data: {
            id: info.event.id
          },
          url: "{{url('admin/appointment/show')}}"
        }).done(function(res) {
          let data = res[0];
          $('.show_patient_name').text(`${data.patient_title} ${data.patient_fname} ${data.patient_lname}`)
          $('.show_patient_opd').text(`${data.opd_id}`)
          var date = data.patient_birthdate;
          var age = 0;
          var dob_year = date.substring(6, 10);
          var date_now = new Date().getFullYear();
          var dob_month = date.substring(3, 5);
          var month_now = new Date().getMonth() + 1;
          if (dob_month <= month_now) {
            age = date_now - dob_year;
          } else {
            age = date_now - dob_year - 1;
          }
          $('.show_patient_age').text(`${age} ปี`)
          $('.show_patient_phone').text(`${data.patient_phone}`)

          if (data.congenital_disease != null) {
            $('.show_patient_congenital_disease').text(`${data.congenital_disease}`)
          } else {
            $('.show_patient_congenital_disease').text(`-`)
          }
          if (data.drug_allergies != null) {
            $('.show_patient_drug_allergies').text(`${data.drug_allergies}`)
          } else {
            $('.show_patient_drug_allergies').text(`-`)
          }
          let appointment_date = new Date(data.appointment_date);
          let appointment_date_th = appointment_date.toLocaleDateString('th-TH', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
          })
          $('.show_appointment_number').text(`${data.appointment_number}`)
          $('.show_appointment_date').text(`${appointment_date_th}`)
          $('.show_appointment_time').text(`${data.appointment_time} น.`)
          $('.show_doctor_name').text(`${data.doctor_title} ${data.doctor_fname} ${data.doctor_lname}`)


          $('.show_reason_for_appointment').text(`${data.reason_for_appointment}`)
          $('.show_doctor_comment').html(`${data.doctor_comment}`)

          let year = new Date(data.created_at).getFullYear();
          let month = new Date(data.created_at).getMonth();
          let day = new Date(data.created_at).getDate();

          let created_at = new Date(data.created_at);
          let date_th = created_at.toLocaleDateString('th-TH', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
          })

          $('.show_created_at').text(`${date_th}`)



        })
      }
    });

    calendar.render();
  });
</script>
@endsection