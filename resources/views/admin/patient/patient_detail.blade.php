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
                <button class="nav-link active py-3 px-2 px-md-3" id="nav-general-tab" data-bs-toggle="tab" data-bs-target="#nav-general" type="button" role="tab" aria-controls="nav-general" aria-selected="true"><i class="fa-solid fa-user"></i> General</button>
                <button class="nav-link py-3 px-2 px-md-3" id="nav-medical-tab" data-bs-toggle="tab" data-bs-target="#nav-medical" type="button" role="tab" aria-controls="nav-medical" aria-selected="false"><i class="fa-solid fa-book-medical"></i> Medical Info</button>
                <button class="nav-link py-3 px-2 px-md-3" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa-solid fa-triangle-exclamation"></i> Emergency Contact</button>
                <button class="nav-link py-3 px-2 px-md-3" id="nav-incident-tab" data-bs-toggle="tab" data-bs-target="#nav-incident" type="button" role="tab" aria-controls="nav-incident" aria-selected="false"><i class="fa-solid fa-clock-rotate-left"></i> Incident</button>
              </div>
            </nav>
            <div class="card-style border-top-0">
              <div class="tab-content" id="nav-tabContent">


                <!-- Tap 1 -->
                <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                  <div class="d-flex justify-content-between">
                  <h4 class="mb-25 text-primary"><i class="fa-solid fa-user"></i> General</h4>
                 <a href="#!"><button type="button" style="height: 40px;" class="btn btn-primary btn-hover"><i class="fa-solid fa-pen-to-square me-1"></i> Edit</button></a>
                  </div>
                  <!-- Tab 1 -->
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
                          <label>First Name </label>
                          <input type="text" placeholder="Nontawat">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Last Name </label>
                          <input type="text" placeholder="Sangkromsawang">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-2">
                        <div class="input-style-1">
                          <label>Nick Name </label>
                          <input type="text" placeholder="Kong">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label><i class="fa-solid fa-address-card"></i> ID Card Number </label>
                          <input type="text" placeholder="1199900862730">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Date of Birth </label>
                          <input type="date">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Age </label>
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
                          <label>Phone Number </label>
                          <input type="text" placeholder="617-802-1898">
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-sm-6 col-md-3">
                        <div class="input-style-1">
                          <label>Email </label>
                          <input type="text" placeholder="kongnontawat.dev@gmail.com">
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-sm-6 col-md-3">
                        <div class="input-style-1">
                          <label>ID Line </label>
                          <input type="text" placeholder="6178021898">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Nationality </label>
                          <input type="text" placeholder="Thai">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Race </label>
                          <input type="text" placeholder="Thai">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Religion </label>
                          <input type="text" placeholder="Buddhism">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Address </label>
                          <textarea name="" id="" cols="30" rows="4"></textarea>
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-3">
                        <div class="select-style-1">
                          <label>Province </label>
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
                          <label>District </label>
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
                          <label>Sub District </label>
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
                          <label>Zip Code </label>
                          <input type="text" placeholder="40000">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-3">
                        <div class="input-style-1">
                          <label>Country </label>
                          <input type="text" placeholder="Thailand">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-3">
                        <div class="input-style-1">
                          <label><i class="fa-solid fa-id-badge"></i> Occupation </label>
                          <input type="text" placeholder="Student">
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-3">
                        <div class="select-style-1">
                          <label><i class="fa-solid fa-people-group"></i> Member Group </label>
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
                        <img src="https://www.kindpng.com/picc/m/252-2524695_dummy-profile-image-jpg-hd-png-download.png" class="rounded-3 me-3" alt="" width="120" height="150" style="object-fit: cover;" id="image-output">
                        <span>
                          <label for="image_update" class="main-btn deactive-btn btn-hover rounded-3 py-2 px-4">
                            <i class="fa-solid fa-folder-open"></i> Upload Image
                            <input type="file" name="" id="image_update" hidden accept="image/png, image/jpg, image/jpeg, image/gif" onchange="loadFile(event)">
                          </label>
                          <p class="text-muted small">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </span>
                      </div>
                      <!-- end col -->
                    </div>
                    <!-- end row -->

                  </div>

                  <!-- Tap 2 -->
                  <div class="tab-pane fade" id="nav-medical" role="tabpanel" aria-labelledby="nav-medical-tab">
                    <!-- Tab 2 -->
                  
                    <div class="d-flex justify-content-between">
                    <h4 class="mb-25 text-success"> <i class="fa-solid fa-book-medical"></i> Patient Medical Info </h4>
                 <a href="#!"><button type="button" style="height: 40px;" class="btn btn-primary btn-hover"><i class="fa-solid fa-pen-to-square me-1"></i> Edit</button></a>
                    </div>
                    <div class="row">
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