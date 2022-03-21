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
              <h2 class=""><a href=""><small class="text-muted"><i class="fa-solid fa-users"></i>Patients / </small></a> Add New
                Patient</h2>
            </div>
          </div>
          <!-- end col -->
          <div class="col-md-6">
            
          </div><!-- end col -->
        </div> <!-- end row -->
      </div>
      <!-- title-wrapper -->

      <!-- ========== Form-wrapper start ========== -->
      <div class="form-layout-wrapper">
        <form action="#">
          <div class="row">
            <div class="12">

              <nav class="ms-2">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button class="nav-link active py-3 px-3 px-md-4" id="nav-general-tab" data-bs-toggle="tab" data-bs-target="#nav-general"
                    type="button" role="tab" aria-controls="nav-general" aria-selected="true"><i
                      class="fa-solid fa-user-pen"></i> Patient General Info</button>
                  <button class="nav-link py-3 px-3 px-md-4" id="nav-medical-info-tab" data-bs-toggle="tab" data-bs-target="#nav-medical-info"
                    type="button" role="tab" aria-controls="nav-medical-info" aria-selected="false"><i
                      class="fa-solid fa-book-medical"></i> Patient Medical Info</button>
                  <button class="nav-link py-3 px-3 px-md-4" id="nav-emc-tab" data-bs-toggle="tab" data-bs-target="#nav-emc"
                    type="button" role="tab" aria-controls="nav-emc" aria-selected="false"><i
                      class="fa-solid fa-triangle-exclamation"></i> Emergency Contact</button>
                </div>
              </nav>

              <div class="card-style mb-30 border-top-0">
                <div class="tab-content" id="nav-tabContent">

                  <!-- Tab 1 -->
                  <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                    <h4 class="mb-25 text-primary"><i class="fa-solid fa-user-pen"></i> Add New Patients </h4>
                    <div class="row">

                      <div class="col-sm-6 col-md-2">
                        <div class="select-style-1">
                          <label>Title </label>
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
                          <label>First Name <span class="text-danger">*</span> </label>
                          <input type="text" placeholder="Nontawat">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Last Name <span class="text-danger">*</span> </label>
                          <input type="text" placeholder="Sangkromsawang">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-2">
                        <div class="input-style-1">
                          <label>Nick Name <span class="text-danger">*</span> </label>
                          <input type="text" placeholder="Kong">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label><i class="fa-solid fa-address-card"></i> ID Card Number <span class="text-danger">*</span> </label>
                          <input type="text" placeholder="1199900862730">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Date of Birth <span class="text-danger">*</span> </label>
                          <input type="date">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Age <span class="text-danger">*</span> </label>
                          <input type="text" placeholder="19" style="max-width: 200px;">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-3 d-flex align-items-center">
                        <div class="input-style-1 d-flex mt-2">
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input" type="radio" value="" id="radio-1" name="sex">
                            <label class="form-check-label" for="radio-1">
                              <i class="fa-solid fa-mars"></i> Male</label>
                          </div>
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input" type="radio" value="" id="radio-2" name="sex">
                            <label class="form-check-label" for="radio-2">
                              <i class="fa-solid fa-venus"></i> Female </label>
                          </div>
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-3">
                        <div class="input-style-1">
                          <label>Phone Number <span class="text-danger">*</span> </label>
                          <input type="text" placeholder="617-802-1898">
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-sm-6 col-md-3">
                        <div class="input-style-1">
                          <label>Email <span class="text-danger">*</span> </label>
                          <input type="text" placeholder="kongnontawat.dev@gmail.com">
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-sm-6 col-md-3">
                        <div class="input-style-1">
                          <label>ID Line <span class="text-danger">*</span> </label>
                          <input type="text" placeholder="6178021898">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Nationality <span class="text-danger">*</span> </label>
                          <input type="text" placeholder="Thai">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Race <span class="text-danger">*</span> </label>
                          <input type="text" placeholder="Thai">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Religion <span class="text-danger">*</span> </label>
                          <input type="text" placeholder="Buddhism">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Address <span class="text-danger">*</span> </label>
                          <textarea name="" id="" cols="30" rows="4"></textarea>
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-3">
                        <div class="select-style-1">
                          <label>Province <span class="text-danger">*</span> </label>
                          <div class="select-position">
                            <select class="light-bg">
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
                            <select class="light-bg">
                              <option value="">เมือง</option>
                              <option value="">California</option>
                              <option value="">New York</option>
                              <option value="">Alaska</option>
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
                            <select class="light-bg">
                              <option value="">ในเมือง</option>
                              <option value="">California</option>
                              <option value="">New York</option>
                              <option value="">Alaska</option>
                            </select>
                          </div>
                        </div>
                        <!-- end select -->
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-3">
                        <div class="input-style-1">
                          <label>Zip Code <span class="text-danger">*</span> </label>
                          <input type="text" placeholder="40000">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-3">
                        <div class="input-style-1">
                          <label>Country  <span class="text-danger">*</span> </label>
                          <input type="text" placeholder="Thailand">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-3">
                        <div class="input-style-1">
                          <label><i class="fa-solid fa-id-badge"></i> Occupation <span class="text-danger">*</span> </label>
                          <input type="text" placeholder="Student">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-3">
                        <div class="select-style-1">
                          <label><i class="fa-solid fa-people-group"></i> Member Group <span class="text-danger">*</span> </label>
                          <div class="select-position">
                            <select class="light-bg">
                              <option value="">Normal</option>
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
                        <img
                          src="https://www.kindpng.com/picc/m/252-2524695_dummy-profile-image-jpg-hd-png-download.png"
                          class="rounded-3 me-3" alt="" width="120" height="150" style="object-fit: cover;" id="image-output">
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
                    <!-- end row -->
                  </div>

                  <!-- Tab 2 -->
                  <div class="tab-pane fade" id="nav-medical-info" role="tabpanel" aria-labelledby="nav-medical-info-tab">
                    <h4 class="mb-25 text-success"> <i class="fa-solid fa-book-medical"></i> Patient Medical Info </h4>
                    <div class="row">

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Weight <span class="text-muted">(kg)</span> </label>
                          <input type="text" placeholder="177">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Height <span class="text-muted">(cm)</span> </label>
                          <input type="text" placeholder="75">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="select-style-1">
                        <label>Blood Group   </label>
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
                          <label>Drug Allergies  </label>
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
                        <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                            <div class="form-check radio-style me-4">
                              <input class="form-check-input pe-1" type="radio" value="" id="smoker-regularly" name="smoker">
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
                        <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="" id="drinks-regularly" name="drinks">
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
                          <label for="">High blood pressure   </label>
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-sm-6">
                        <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                            <div class="form-check radio-style me-4">
                              <input class="form-check-input pe-1" type="radio" value="" id="high_blood-yes" name="high_blood">
                              <label class="form-check-label" for="high_blood-yes">
                              <i class="fa-solid fa-check"></i> Yes </label>
                            </div>
                            <div class="form-check radio-style me-4">
                              <input class="form-check-input pe-1" type="radio" value="" id="high_blood-no" name="high_blood">
                              <label class="form-check-label" for="high_blood-no">
                              <i class="fa-solid fa-xmark"></i> No </label>
                            </div>
                          </div>
                      </div>
                      <hr class="m-0 mb-3">

                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label for="">Diabetic  </label>
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-sm-6">
                        <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
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
                          <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
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
                          <label for="">Heart deisease  <span class="text-danger">*</span> </label>
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-sm-6">
                        <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
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
                        <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
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
                        <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
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
                          <label>High Risk Diseases  </label>
                          <textarea name="" id="" cols="30" rows="2"></textarea>
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Surgery  </label>
                          <textarea name="" id="" cols="30" rows="2"></textarea>
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Accident  </label>
                          <textarea name="" id="" cols="30" rows="2"></textarea>
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label>Medical History  </label>
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

                  <!-- Tab 3 -->
                  <div class="tab-pane fade" id="nav-emc" role="tabpanel" aria-labelledby="nav-emc-tab">
                    <h4 class="mb-25 text-warning"><i class="fa-solid fa-triangle-exclamation"></i> Emergency Contact</h4>
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
                          <label>First Name </label>
                          <input type="text" placeholder="Nontawat">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Last Name</label>
                          <input type="text" placeholder="Sangkromsawang">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-2">
                        <div class="select-style-1" style="max-width: 200px;">
                          <label>Relation </label>
                          <div class="select-position">
                            <select class="light-bg">
                              <option value="">Dad</option>
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
                          <label>Phone </label>
                          <input type="text" placeholder="064-487-0915">
                        </div>
                      </div>
                      <!-- end col -->

                    </div>
                    <!-- end row -->
                  </div>


                </div><!-- end Content Tab -->

                <!-- Submit Btn -->
                <hr class="my-3" style="border: 1px solid #E2E8EC;">
                <div class="row">
                  <div class="col-12 mt-4">
                    <div class="button-group d-flex flex-wrap align-items-end">
                      <button class="main-btn danger-btn p-2 mx-2 mb-3">
                        <i class="fa-solid fa-xmark"></i> Cancel
                      </button>
                      <button class="main-btn light-btn p-2 mx-2 mb-3">
                        <i class="fa-solid fa-arrow-rotate-left"></i> Reset
                      </button>
                      <button class="main-btn primary-btn btn-hover mx-2 mb-3">
                        <i class="fa-solid fa-floppy-disk"></i> Submit
                      </button>
                    </div>
                  </div>
                </div>
              </div><!-- end card -->

            </div><!-- end row -->

        </form>
      </div>
      <!-- ========== Form-wrapper end ========== -->
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