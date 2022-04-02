@extends('admin.layouts.app')

@section('style')
<!-- <link rel="stylesheet" href="{{ asset('js/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/flatpickr/dist/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/datatables.net/dataTables.dateTime.min.css') }}"> -->
<link rel="stylesheet" href="{{ asset('js/fullcalendar/main.min.css') }}">
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
              <h3 class="text-bold">30 ราย</h3>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="icon-card mb-20">
            <div class="icon success">
              <i class="fa-solid fa-rectangle-list"></i>
            </div>
            <div class="content">
              <h6 class="mb-10">Scheduled</h6>
              <h3 class="text-bold">20 ราย</h3>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="icon-card mb-20">
            <div class="icon primary">
              <i class="fa-solid fa-list-check"></i>
            </div>
            <div class="content">
              <h6 class="mb-10">Reserved</h6>
              <h3 class="text-bold">5 ราย</h3>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="icon-card mb-20">
            <div class="icon orange">
              <i class="fa-solid fa-clipboard-check"></i>
            </div>
            <div class="content">
              <h6 class="mb-10">Checked out Today</h6>
              <h3 class="text-bold">5 ราย</h3>
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

@endsection
@section('script')
<script src="{{ asset('js/fullcalendar/main.min.js') }}"></script>
<!-- <script src="{{ asset('js/datatables.net/js/jquery.dataTables.min.js') }}"></script> -->
<!-- <script src="{{ asset('js/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script> -->
<!-- <script src="{{ asset('js/flatpickr/dist/flatpickr.min.js') }}"></script> -->
<!-- <script src="{{ asset('js/cleave.js/dist/cleave.min.js') }}"></script> -->
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
        // console.log(info.event)
      }
    });
    calendar.render();
  });
</script>
@endsection