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
              <h2 class="h2"> <a href=""><small class="text-muted"><i class="fa-solid fa-users"></i> Patients /
                  </small></a>
                Patient Details</h2>
            </div>
          </div>

          <!-- end col -->
          <div class="col-md-6">

          </div><!-- end col -->
        </div> <!-- end row -->
      </div>
      <!-- title-wrapper -->

      <!-- ========== table-wrapper start ========== -->
      <div class="table-layout-wrapper">
        <div class="row gx-2">
          <div class="col-md-4 col-xl-3">
            <div class="card-style mb-30">
              <img
                src="https://previews.123rf.com/images/djvstock/djvstock1705/djvstock170517800/79273286-nurse-avatar-profile-icon-vector-illustration-graphic-design.jpg"
                alt="" class="img-fluid mx-auto d-block" style="max-width: 200px;">
              <h5 class="text-center mt-3 fw-normal text-primary">HR00783</h5>
              <h4 class="text-center mt-2">Mr. Nontawat Sangkromsawang <small class="text-muted">(Kong)</small></h4>
              <div class="icon primary mx-auto mt-2">
                Normal
              </div>
              <table class="table table-striped mt-3">
                <tbody>
                  <tr>
                    <th scope="row" class=" fw-normal">FULL NAME:</th>
                    <td class="">Mr. Nontawat Sangkromsawang</td>
                  </tr>
                  <tr>
                    <th scope="row" class=" fw-normal">ID card:</th>
                    <td class="">1199900862730</td>
                  </tr>
                  <tr>
                    <th scope="row" class=" fw-normal">BIRTH DATE:</th>
                    <td class="">10-09-2002</td>
                  </tr>
                  <tr>
                    <th scope="row" class=" fw-normal">AGE:</th>
                    <td class="">19</td>
                  </tr>
                  <tr>
                    <th scope="row" class=" fw-normal">SEX:</th>
                    <td class="">Male</td>
                  </tr>
                  <tr>
                    <th scope="row" class=" fw-normal">PHONE:</th>
                    <td class="">064-487-0915</td>
                  </tr>
                  <tr>
                    <th scope="row" class=" fw-normal">BloodGroup:</th>
                    <td class="">B</td>
                  </tr>
                  <tr>
                    <th scope="row" class=" fw-normal">DRUG ALLERGIES:</th>
                    <td class="">-</td>
                  </tr>
                  <tr>
                    <th scope="row" class=" fw-normal">CONGENITAL_DISEASE:</th>
                    <td class="">-</td>
                  </tr>
                  <tr>
                    <th scope="row" class=" fw-normal">NOTE:</th>
                    <td class="">-</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="col-md-8 col-xl-9">
            <nav class="ms-1">
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active py-3 px-2 px-md-3" id="nav-general-tab" data-bs-toggle="tab"
                  data-bs-target="#nav-general" type="button" role="tab" aria-controls="nav-general"
                  aria-selected="true"><i class="fa-solid fa-user"></i> General</button>
                <button class="nav-link py-3 px-2 px-md-3" id="nav-medical-tab" data-bs-toggle="tab"
                  data-bs-target="#nav-medical" type="button" role="tab" aria-controls="nav-medical"
                  aria-selected="false"><i class="fa-solid fa-book-medical"></i> Medical Info</button>
                <button class="nav-link py-3 px-2 px-md-3" id="nav-contact-tab" data-bs-toggle="tab"
                  data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                  aria-selected="false"><i class="fa-solid fa-triangle-exclamation"></i> Emergency Contact</button>
                <button class="nav-link py-3 px-2 px-md-3" id="nav-incident-tab" data-bs-toggle="tab"
                  data-bs-target="#nav-incident" type="button" role="tab" aria-controls="nav-incident"
                  aria-selected="false"><i class="fa-solid fa-clock-rotate-left"></i> Incident</button>
              </div>
            </nav>
            <div class="card-style border-top-0">
              <div class="tab-content" id="nav-tabContent">
                <!-- Tap 1 -->
                <div class="tab-pane fade show active" id="nav-general" role="tabpanel"
                  aria-labelledby="nav-general-tab">
                  1Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, amet pariatur! Unde voluptas aut,
                  aliquid ad tenetur molestiae. Sint repudiandae eligendi debitis hic! Corporis, aut sunt. Expedita
                  ratione
                  rerum provident culpa vero laboriosam obcaecati quaerat amet? Deleniti quo recusandae, voluptates,
                  reiciendis illum ipsam rerum architecto praesentium illo ab sequi, qui debitis laboriosam cum adipisci
                  numquam quod? Sed iusto, consectetur distinctio doloribus ad optio? Obcaecati illo, impedit et
                  quisquam
                  corrupti rerum.
                </div>

                <!-- Tap 2 -->
                <div class="tab-pane fade" id="nav-medical" role="tabpanel" aria-labelledby="nav-medical-tab">
                  2Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, amet pariatur! Unde voluptas aut,
                  aliquid ad tenetur molestiae. Sint repudiandae eligendi debitis hic! Corporis, aut sunt. Expedita
                  ratione
                  rerum provident culpa vero laboriosam obcaecati quaerat amet? Deleniti quo recusandae, voluptates,
                  reiciendis illum ipsam rerum architecto praesentium illo ab sequi, qui debitis laboriosam cum adipisci
                  numquam quod? Sed iusto, consectetur distinctio doloribus ad optio? Obcaecati illo, impedit et
                  quisquam
                  corrupti rerum.
                </div>

                <!-- Tap 3 -->
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                  3Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, amet pariatur! Unde voluptas aut,
                  aliquid ad tenetur molestiae. Sint repudiandae eligendi debitis hic! Corporis, aut sunt. Expedita
                  ratione
                  rerum provident culpa vero laboriosam obcaecati quaerat amet? Deleniti quo recusandae, voluptates,
                  reiciendis illum ipsam rerum architecto praesentium illo ab sequi, qui debitis laboriosam cum adipisci
                  numquam quod? Sed iusto, consectetur distinctio doloribus ad optio? Obcaecati illo, impedit et
                  quisquam
                  corrupti rerum.
                </div>

                <!-- Tap 4 -->
                <div class="tab-pane fade" id="nav-incident" role="tabpanel" aria-labelledby="nav-incident-tab">
                  4Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, amet pariatur! Unde voluptas aut,
                  aliquid ad tenetur molestiae. Sint repudiandae eligendi debitis hic! Corporis, aut sunt. Expedita
                  ratione
                  rerum provident culpa vero laboriosam obcaecati quaerat amet? Deleniti quo recusandae, voluptates,
                  reiciendis illum ipsam rerum architecto praesentium illo ab sequi, qui debitis laboriosam cum adipisci
                  numquam quod? Sed iusto, consectetur distinctio doloribus ad optio? Obcaecati illo, impedit et
                  quisquam
                  corrupti rerum.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ========== table-wrapper end ========== -->
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
  $('.patient').addClass('active')
  $('.patient ul').addClass('show ')




})
var loadFile = function(event) {
  var output = document.getElementById('image-output');
  output.src = URL.createObjectURL(event.target.files[0]);
  output.onload = function() {
    URL.revokeObjectURL(output.src) // free memory
  }
};
</script>
@endsection