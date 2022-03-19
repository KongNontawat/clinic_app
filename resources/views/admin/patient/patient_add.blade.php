@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('js/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
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
            <div class="title d-flex align-items-center flex-wrap mb-30">
              <h2 class="me-4"><small class="text-muted"><i class="fa-solid fa-users"></i> Patients</small> / Add New Patient</h2>
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
                  <li class="breadcrumb-item">
                    <a href="#!">Patients</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Add New Patients 
                  </li>
                </ol>
              </nav>
            </div>
          </div><!-- end col -->
        </div> <!-- end row -->
      </div><!-- title-wrapper -->

      <!-- ========== Form-wrapper start ========== -->
      <div class="form-layout-wrapper">
            <div class="row">
              <div class="12">
                <div class="card-style mb-30">
                  <h6 class="mb-25">Add New Patients </h6>
                  <form action="#">
                    <div class="row">

                      <div class="col-sm-6 col-md-2">
                        <div class="select-style-1">
                          <label>Title</label>
                          <div class="select-position">
                            <select class="light-bg">
                              <option value="">Mr.</option>
                              <option value="">Ms.</option>
                              <option value="">Mrs.</option>
                              <option value="">Miss</option>
                              <option value="">Dr.</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>First Name</label>
                          <input type="text" placeholder="John">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Last Name</label>
                          <input type="text" placeholder="Doe">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-2">
                        <div class="input-style-1">
                          <label>Nick Name</label>
                          <input type="text" placeholder="Doe">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Phone Number</label>
                          <input type="text" placeholder="617-802-1898">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Address</label>
                          <textarea name="" id="" cols="30" rows="4"></textarea>
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-12">
                        <div class="input-style-1">
                          <label>City</label>
                          <input type="text" placeholder="Hayward">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6">
                        <div class="select-style-1">
                          <label>State</label>
                          <div class="select-position">
                            <select class="light-bg">
                              <option value="">Select State</option>
                              <option value="">California</option>
                              <option value="">New York</option>
                              <option value="">Alaska</option>
                            </select>
                          </div>
                        </div>
                        <!-- end select -->
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label>Zip Code</label>
                          <input type="text" placeholder="00611">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-12">
                        <div class="
                            form-check
                            checkbox-style checkbox-success
                            mb-30
                          ">
                          <input class="form-check-input" type="checkbox" value="" id="checkbox-agree">
                          <label class="form-check-label" for="checkbox-agree">
                            I Agree to term and condition</label>
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-12 mt-4">
                        <div class="button-group">
                          <button class="main-btn danger-btn mx-2 p-2">
                            <i class="fa-solid fa-xmark"></i> Cancel
                          </button>
                          <button class="main-btn light-btn mx-2 p-2">
                            <i class="fa-solid fa-arrow-rotate-left"></i> Reset
                          </button>
                          <button class="main-btn primary-btn btn-hover">
                            <i class="fa-solid fa-floppy-disk"></i> Submit
                          </button>
                        </div>
                      </div>
                      
                    </div>
                    <!-- end row -->
                  </form>
                </div>
                <!-- end card -->

              </div>
            </div>
            <!-- end row -->
          </div>

			<div class="card-style">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam iusto ex tempora. Sint, iusto expedita modi numquam blanditiis mollitia quam.
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
<script>
$(function() {
  $('.patient').addClass('active')
	$('.table').DataTable({
		"language": {
    "paginate": {
      "next": ">",
			"previous": "<"	
    }
  },
	"lengthMenu": [ 2, 5, 10, 75, 100 ]
	});
  $('.table-responsive').on('show.bs.dropdown', function() {
    $('.table-responsive').css("overflow", "inherit");
  });

  $('.table-responsive').on('hide.bs.dropdown', function() {
    $('.table-responsive').css("overflow", "auto");
  })

})
</script>
@endsection