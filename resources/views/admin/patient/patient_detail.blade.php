@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('js/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<style>
input,
select {
  background-color: #fff !important;
}

label {
  color: #6D777F !important;
  margin-bottom: 0 !important;
}
</style>
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
              <!-- <img
                src="https://previews.123rf.com/images/djvstock/djvstock1705/djvstock170517800/79273286-nurse-avatar-profile-icon-vector-illustration-graphic-design.jpg"
                alt="" class="img-fluid mx-auto d-block" style="max-width: 200px;"> -->
              <img src="{{asset('/image/p farm.jpg')}}" class="rounded mx-auto d-block" style="width: 80%;" alt="" />
              <h5 class="text-center mt-3 fw-normal text-primary">HR00783</h5>
              <h4 class="text-center mt-2">Mr. Nontawat Sangkromsawang <small class="text-muted">(Kong)</small></h4>
              <div class="label-icon primary mx-auto mt-2">
                Normal
              </div>
              <table class="table table-striped mt-3">
                <tbody>
                  <tr>
                    <th scope="row " class=" fw-normal">FULL NAME:</th>
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


                <div class="tab-pane fade show active" id="nav-general" role="tabpanel"
                  aria-labelledby="nav-general-tab">
                  <div class="d-flex justify-content-between">
                    <h4 class="mb-25 text-primary"><i class="fa-solid fa-user-pen"></i> General </h4>
                    <button type="button" id="btn-edit" class="btn btn-primary btn-edit" style="height: 40px;"><i
                        class="fa-solid fa-pen-to-square"></i> Edit</button>
                  </div>
                  <div class="row">

                    <div class="col-sm-6 col-md-2">
                      <div class="select-style-1">
                        <label>Title <span class="text-danger">*</span></label>
                        <div class="select-position">
                          <select class="light-bg" required="required">
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="ดช.">ดช.</option>
                            <option value="ดญ.">ดญ.</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>First Name <span class="text-danger">*</span> </label>
                        <input type="text" placeholder="นนทวัฒน์" required="required" data-parsley-maxlength="100"
                          class="form-control">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Last Name <span class="text-danger">*</span> </label>
                        <input type="text" placeholder="แสงความสว่าง" required="required" data-parsley-maxlength="255"
                          class="form-control">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-2">
                      <div class="input-style-1">
                        <label>Nick Name </label>
                        <input type="text" placeholder="ก้อง" data-parsley-maxlength="50">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label><i class="fa-solid fa-address-card"></i> ID Card Number <span
                            class="text-danger">*</span> </label>
                        <input type="text" placeholder="1 1999 00862 73 0" required="required"
                          data-parsley-minlength="17" data-parsley-maxlength="17" id="id_card" class="form-control">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Date of Birth <span class="text-danger">*</span> </label>
                        <input type="date" required="required" id="dob">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Age <span class="text-danger">*</span> </label>
                        <input type="number" placeholder="19" style="max-width: 200px;" required="required"
                          data-parsley-minlength="0" data-parsley-maxlength="100" id="age" class="form-control">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3 d-flex align-items-center">
                      <div class="input-style-1 d-flex mt-2">
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input" type="radio" value="male" id="radio-1" name="sex"
                            required="required">
                          <label class="form-check-label" for="radio-1">
                            <i class="fa-solid fa-mars"></i> ชาย <span class="text-danger">*</span> </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input" type="radio" value="female" id="radio-2" name="sex">
                          <label class="form-check-label" for="radio-2">
                            <i class="fa-solid fa-venus"></i> หญิง <span class="text-danger">*</span> </label>
                        </div>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="input-style-1">
                        <label>Phone Number <span class="text-danger">*</span> </label>
                        <input type="text" placeholder="064-487-0915" required="required" data-parsley-minlength="9"
                          data-parsley-maxlength="13" id="phone_number" class="form-control">
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-6 col-md-3">
                      <div class="input-style-1">
                        <label>Email </label>
                        <input type="email" placeholder="kongnontawat.dev@gmail.com" data-parsley-trigger="change"
                          data-parsley-maxlength="255" class="form-control">
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-6 col-md-3">
                      <div class="input-style-1">
                        <label>ID Line</label>
                        <input type="text" placeholder="6178021898" data-parsley-maxlength="255" class="form-control">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Nationality </label>
                        <input type="text" placeholder="ไทย" class="form-control">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Race </label>
                        <input type="text" placeholder="ไทย" class="form-control">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Religion </label>
                        <input type="text" placeholder="พุทธ" class="form-control">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Address <span class="text-danger">*</span> </label>
                        <textarea name="" id="" cols="30" rows="4" required="required" class="form-control"></textarea>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="select-style-1">
                        <label>Province <span class="text-danger">*</span> </label>
                        <div class="select-position">
                          <select class="light-bg" required="required">
                            <option value="">ขอนแก่น</option>
                          </select>
                        </div>
                      </div>
                      <!-- end select -->
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="select-style-1">
                        <label>District <span class="text-danger">*</span> </label>
                        <div class="select-position">
                          <select class="light-bg" required="required">
                            <option value="">เมือง</option>
                          </select>
                        </div>
                      </div>
                      <!-- end select -->
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="select-style-1">
                        <label>Sub District <span class="text-danger">*</span> </label>
                        <div class="select-position">
                          <select class="light-bg" required="required">
                            <option value="">ในเมือง</option>
                          </select>
                        </div>
                      </div>
                      <!-- end select -->
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="input-style-1">
                        <label>Zip Code <span class="text-danger">*</span> </label>
                        <input type="text" placeholder="40000" required="required" data-parsley-maxlength="10"
                          data-parsley-minlength="6" class="form-control">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="input-style-1">
                        <label>Country <span class="text-danger">*</span> </label>
                        <input type="text" placeholder="ประเทศไทย" required="required" class="form-control">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="input-style-1">
                        <label><i class="fa-solid fa-id-badge"></i> Occupation </label>
                        <input type="text" placeholder="นักศึกษา" class="form-control">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="select-style-1">
                        <label><i class="fa-solid fa-people-group"></i> Member Group <span class="text-danger">*</span>
                        </label>
                        <div class="select-position">
                          <select class="light-bg" required="required">
                            <option value="" selected>Normal</option>
                            <option value="">New Member</option>
                            <option value="">Old Member</option>
                            <option value="">VIP1</option>
                            <option value="">VIP2</option>
                            <option value="">VVIP</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-12">
                      <p><i class="fa-solid fa-image"></i> Image profile</p>
                      <img src="https://www.kindpng.com/picc/m/252-2524695_dummy-profile-image-jpg-hd-png-download.png"
                        class="rounded-3 me-3" alt="" width="120" height="150" style="object-fit: cover;"
                        id="image-output">
                      <span>
                        <label for="image_update" class="main-btn deactive-btn btn-hover rounded-3 py-2 px-4">
                          <i class="fa-solid fa-folder-open"></i> Upload Image
                          <input type="file" name="" id="image_update" hidden
                            accept="image/png, image/jpg, image/jpeg, image/gif" onchange="loadFile(event)">
                        </label>
                        <p class="text-muted small">Allowed JPG, GIF or PNG. Max size of 800K</p>
                      </span>
                    </div>
                    <!-- end col -->
                  </div>
                  <!-- end col -->
                </div>
                <!-- end row -->


                <div class="tab-pane fade" id="nav-medical" role="tabpanel" aria-labelledby="nav-medical-tab">
                  <div class="d-flex justify-content-between">
                    <h4 class="mb-25 text-success"> <i class="fa-solid fa-book-medical"></i> Medical Info </h4>
                    <a href="#">
                      <button type="button" id="btn-edit" class="btn btn-primary btn-edit" style="height: 40px;"><i
                          class="fa-solid fa-pen-to-square"></i> Edit</button>
                    </a>
                  </div>

                  <div class="row">

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Weight <span class="text-muted">(kg)</span> </label>
                        <input type="number" placeholder="177" data-parsley-minlength="0">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Height <span class="text-muted">(cm)</span> </label>
                        <input type="text" placeholder="75" data-parsley-minlength="0">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="select-style-1">
                        <label>Blood Group </label>
                        <div class="select-position">
                          <select class="light-bg">
                            <option value="">A</option>
                            <option value="">B</option>
                            <option value="">O</option>
                            <option value="">AB</option>
                            <option value="">AB-</option>
                            <option value="">AB+</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6">
                      <div class="input-style-1">
                        <label>Drug Allergies </label>
                        <textarea name="" id="" cols="30" rows="2"></textarea>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6">
                      <div class="input-style-1">
                        <label>Food Allergies </label>
                        <textarea name="" id="" cols="30" rows="2"></textarea>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Congenital Disease </label>
                        <textarea name="" id="" cols="30" rows="3"></textarea>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6">
                      <div class="input-style-1">
                        <label for="">Smoker</label>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div
                        class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="smoker-regularly"
                            name="smoker">
                          <label class="form-check-label" for="smoker-regularly">
                            <i class="fa-solid fa-check"></i> Regularly</label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="smoker-once" name="smoker">
                          <label class="form-check-label" for="smoker-once">
                            <i class="fa-solid fa-clock"></i> Once in a while </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="smoker-no" name="smoker">
                          <label class="form-check-label" for="smoker-no">
                            <i class="fa-solid fa-xmark"></i> No </label>
                        </div>
                      </div>
                    </div>
                    <!-- end col -->
                    <hr class="m-0 mb-3">


                    <div class="col-sm-6">
                      <div class="input-style-1">
                        <label for="">Drinks</label>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div
                        class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="drinks-regularly"
                            name="drinks">
                          <label class="form-check-label" for="drinks-regularly">
                            <i class="fa-solid fa-check"></i> Regularly </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="drinks-once" name="drinks">
                          <label class="form-check-label" for="drinks-once">
                            <i class="fa-solid fa-clock"></i> Once in a while </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="drinks-no" name="drinks">
                          <label class="form-check-label" for="drinks-no">
                            <i class="fa-solid fa-xmark"></i> No</label>
                        </div>
                      </div>
                    </div>
                    <!-- end col -->
                    <hr class="m-0 mb-3">


                    <div class="col-sm-6">
                      <div class="input-style-1">
                        <label for="">High blood pressure </label>
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-6">
                      <div
                        class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="high_blood-yes"
                            name="high_blood">
                          <label class="form-check-label" for="high_blood-yes">
                            <i class="fa-solid fa-check"></i> Yes </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="high_blood-no"
                            name="high_blood">
                          <label class="form-check-label" for="high_blood-no">
                            <i class="fa-solid fa-xmark"></i> No </label>
                        </div>
                      </div>
                    </div>
                    <hr class="m-0 mb-3">

                    <div class="col-sm-6">
                      <div class="input-style-1">
                        <label for="">Diabetic </label>
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-6">
                      <div
                        class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="diabetic-yes" name="diabetic">
                          <label class="form-check-label" for="diabetic-yes">
                            <i class="fa-solid fa-check"></i> Yes </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="diabetic-no" name="diabetic">
                          <label class="form-check-label" for="diabetic-no">
                            <i class="fa-solid fa-xmark"></i> No </label>
                        </div>
                      </div>
                    </div>
                    <hr class="m-0 mb-3">

                    <div class="col-sm-6">
                      <div class="input-style-1">
                        <label for="">Bleed tendency </label>
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-6">
                      <div
                        class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="diabetic-yes" name="diabetic">
                          <label class="form-check-label" for="diabetic-yes">
                            <i class="fa-solid fa-check"></i> Yes </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="diabetic-no" name="diabetic">
                          <label class="form-check-label" for="diabetic-no">
                            <i class="fa-solid fa-xmark"></i> No </label>
                        </div>
                      </div>
                    </div>
                    <hr class="m-0 mb-3">

                    <div class="col-sm-6">
                      <div class="input-style-1">
                        <label for="">Heart deisease </label>
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-6">
                      <div
                        class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="diabetic-yes" name="diabetic">
                          <label class="form-check-label" for="diabetic-yes">
                            <i class="fa-solid fa-check"></i> Yes </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="diabetic-no" name="diabetic">
                          <label class="form-check-label" for="diabetic-no">
                            <i class="fa-solid fa-xmark"></i> No </label>
                        </div>
                      </div>
                    </div>
                    <hr class="m-0 mb-3">

                    <div class="col-sm-6">
                      <div class="input-style-1">
                        <label for="">Female Pregnant </label>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div
                        class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="diabetic-yes" name="diabetic">
                          <label class="form-check-label" for="diabetic-yes">
                            <i class="fa-solid fa-check"></i> Yes </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="diabetic-no" name="diabetic">
                          <label class="form-check-label" for="diabetic-no">
                            <i class="fa-solid fa-xmark"></i> No</label>
                        </div>
                      </div>
                    </div>
                    <!-- end col -->
                    <hr class="m-0 mb-3">

                    <div class="col-sm-6">
                      <div class="input-style-1">
                        <label for="">Register Chanel </label>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div
                        class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="diabetic-yes" name="diabetic">
                          <label class="form-check-label" for="diabetic-yes">
                            <i class="fa-solid fa-building-user"></i> Walk-in </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="diabetic-no" name="diabetic">
                          <label class="form-check-label" for="diabetic-no">
                            <i class="fa-solid fa-phone"></i> Call phone</label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="" id="diabetic-no" name="diabetic">
                          <label class="form-check-label" for="diabetic-no">
                            <i class="fa-solid fa-globe"></i> Online </label>
                        </div>
                      </div>
                    </div>
                    <!-- end col -->
                    <hr class="m-0 mb-3">

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>High Risk Diseases </label>
                        <textarea name="" id="" cols="30" rows="2"></textarea>
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Surgery </label>
                        <textarea name="" id="" cols="30" rows="2"></textarea>
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Accident </label>
                        <textarea name="" id="" cols="30" rows="2"></textarea>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6">
                      <div class="input-style-1">
                        <label>Medical History </label>
                        <textarea name="" id="" cols="30" rows="3"></textarea>
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-6">
                      <div class="input-style-1">
                        <label>Current Medication </label>
                        <textarea name="" id="" cols="30" rows="3"></textarea>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Note : </label>
                        <textarea name="" id="" cols="30" rows="5"></textarea>
                      </div>
                    </div>
                    <!-- end col -->


                  </div>
                  <!-- end row -->
                </div>


                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                  <div class="d-flex justify-content-between">
                    <h4 class="mb-25 text-warning"><i class="fa-solid fa-triangle-exclamation"></i> Emergency Contact
                    </h4>
                    <a href="#">
                      <button type="button" id="btn-edit" class="btn btn-primary btn-edit" style="height: 40px;"><i
                          class="fa-solid fa-pen-to-square"></i> Edit</button>
                    </a>
                  </div>
                  <div class="row">

                    <div class="col-sm-6 col-md-2">
                        <div class="select-style-1">
                          <label>Title</label>
                          <div class="select-position">
                            <select class="light-bg">
                              <option value="นาย">นาย</option>
                              <option value="นาง">นาง</option>
                              <option value="นางสาว">นางสาว</option>
                              <option value="ดช.">ดช.</option>
                              <option value="ดญ.">ดญ.</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>First Name </label>
                          <input type="text" placeholder="นนทวัฒน์" data-parsley-maxlength="255" >
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Last Name</label>
                          <input type="text" placeholder="แสงความสว่าง" data-parsley-maxlength="255">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-2">
                        <div class="select-style-1" style="max-width: 200px;">
                          <label>Relation </label>
                          <div class="select-position">
                            <select class="light-bg">
                              <option value="">ญาติ</option>
                              <option value="">บิดา</option>
                              <option value="">มารดา</option>
                              <option value="">พี่น้อง</option>
                              <option value="">เพื่อน</option>
                              <option value="">คนรู้จัก</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- end col -->


                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Phone </label>
                          <input type="text" placeholder="064-487-0915" id="emc_phone">
                        </div>
                      </div>
                      <!-- end col -->

                    </div>
                    <!-- end row -->
                  </div>
                  <!-- end row -->
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

  $('.btn-edit').on('click', function() {
    var inputs = document.querySelectorAll('input');
    for (var i = 0; i < inputs.length; i++) {
      inputs[i].disabled = false;
    }
    var selects = document.querySelectorAll('select');
    for (var i = 0; i < selects.length; i++) {
      selects[i].disabled = false;
    }
    $('.btn-edit').hide();
  })

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