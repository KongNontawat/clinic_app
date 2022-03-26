@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('js/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<style>
  input,
  select,
  textarea {
    background-color: #fff !important;
    color: #000 !important;
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
                <button class="nav-link active py-3 px-2 px-md-3" id="nav-general-tab" data-bs-toggle="tab" data-bs-target="#nav-general" type="button" role="tab" aria-controls="nav-general" aria-selected="true"><i class="fa-solid fa-user"></i> General</button>
                <button class="nav-link py-3 px-2 px-md-3" id="nav-medical-tab" data-bs-toggle="tab" data-bs-target="#nav-medical" type="button" role="tab" aria-controls="nav-medical" aria-selected="false"><i class="fa-solid fa-book-medical"></i> Medical Info</button>
                <button class="nav-link py-3 px-2 px-md-3" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa-solid fa-triangle-exclamation"></i> Emergency Contact</button>
                <button class="nav-link py-3 px-2 px-md-3" id="nav-incident-tab" data-bs-toggle="tab" data-bs-target="#nav-incident" type="button" role="tab" aria-controls="nav-incident" aria-selected="false"><i class="fa-solid fa-clock-rotate-left"></i> Incident</button>
              </div>
            </nav>
            <div class="card-style border-top-0">
              <div class="tab-content" id="nav-tabContent">

                <!-- Tab 1 -->
                <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                  <div class="d-flex justify-content-between">
                    <h4 class="mb-25 text-primary"><i class="fa-solid fa-user-pen"></i> General </h4>
                    <button type="button" id="btn-edit" class="btn btn-primary btn-edit" style="height: 40px;"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                  </div>
                  <div class="row">

                    <div class="col-sm-6 col-md-2">
                      <div class="select-style-1">
                        <label>Title <span class="text-danger">*</span></label>
                        <div class="select-position">
                          <select class="light-bg" required="required" name="title" disabled>
                            <option value="นาง">นาง</option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="ดช.">ดช.</option>
                            <option value="ดญ.">ดญ.</option>
                          </select>
                          @error('title')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>First Name <span class="text-danger">*</span> </label>
                        <input type="text" value="{{old('fname')}}" name="fname" required="required" data-parsley-maxlength="100" class="form-control" placeholder="Please enter your First Name" disabled>
                        @error('fname')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Last Name <span class="text-danger">*</span> </label>
                        <input type="text" value="{{old('lname')}}" name="lname" required="required" data-parsley-maxlength="255" class="form-control" placeholder="Please enter your Last Name" disabled>
                        @error('lname')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-2">
                      <div class="input-style-1">
                        <label>Nick Name </label>
                        <input type="text" value="{{old('nname')}}" name="nname" data-parsley-maxlength="50" placeholder="Please enter your Nick Name" disabled>
                        @error('nname')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label><i class="fa-solid fa-address-card"></i> ID Card Number <span class="text-danger">*</span> </label>
                        <input type="text" value="{{old('id_card')}}" placeholder="Please enter your ID Card Number" name="id_card" required="required" data-parsley-minlength="17" data-parsley-maxlength="17" id="id_card" class="form-control" disabled>
                        @error('id_card')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Date of Birth <span class="text-danger">*</span> </label>
                        <input type="date" required="required" id="dob" name="birthdate" value="{{old('birthdate')}}" disabled>
                        @error('birthdate')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Age <span class="text-danger">*</span> </label>
                        <input type="number" value="{{old('age')}}" placeholder="Age automatically calculate" name="age" style="max-width: 200px;" required="required" data-parsley-minlength="0" data-parsley-maxlength="100" id="age" class="form-control" disabled>
                        @error('age')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3 d-flex align-items-center">
                      <div class="input-style-1 d-flex mt-2">
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input" type="radio" value="male" id="radio-1" name="sex" required="required" {{ old('sex') == 'male' ? "checked" :""}} disabled>
                          <label class="form-check-label" for="radio-1">
                            <i class="fa-solid fa-mars"></i> ชาย <span class="text-danger">*</span> </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input" type="radio" value="female" id="radio-2" name="sex" {{ old('sex') == 'female' ? "checked" :""}} disabled>
                          <label class="form-check-label" for="radio-2">
                            <i class="fa-solid fa-venus"></i> หญิง <span class="text-danger">*</span> </label>
                        </div>
                        @error('sex')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="input-style-1">
                        <label>Phone Number <span class="text-danger">*</span> </label>
                        <input type="text" value="{{old('phone')}}" placeholder="Please enter your Phone Number" name="phone" required="required" data-parsley-minlength="9" data-parsley-maxlength="13" id="phone_number" class="form-control" disabled>
                        @error('phone')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-6 col-md-3">
                      <div class="input-style-1">
                        <label>Email </label>
                        <input type="email" value="{{old('email')}}" placeholder="Please enter your Email" name="email" data-parsley-trigger="change" data-parsley-maxlength="255" class="form-control" disabled>
                        @error('email')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-6 col-md-3">
                      <div class="input-style-1">
                        <label>ID Line</label>
                        <input type="text" value="{{old('id_line')}}" name="id_line" data-parsley-maxlength="255" class="form-control" placeholder="Please enter your ID Line" disabled>
                        @error('id_line')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Nationality </label>
                        <input type="text" value="ไทย" name="nationality" class="form-control" placeholder="Please enter your Nationality" disabled>
                        @error('nationality')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Race </label>
                        <input type="text" value="ไทย" name="race" class="form-control" placeholder="Please enter your Race" disabled>
                        @error('race')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Religion </label>
                        <input type="text" value="พุทธ" name="religion" class="form-control" placeholder="Please enter your Religion" disabled>
                        @error('religion')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Address <span class="text-danger">*</span> </label>
                        <textarea name="address" placeholder="Please enter your address" id="" cols="30" rows="4" required="required" class="form-control" disabled>{{old('address') ? old('address') : "บ้านเลขที่:     หมู่ที่:     ถนน:     ตรอก/ซอย:"}}</textarea>
                        @error('address')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="select-style-1">
                        <label>Province <span class="text-danger">*</span> </label>
                        <div class="select-position">
                          <select class="light-bg" required="required" name="province_id" id="province_select" style="width: 100%;" disabled>
                            <option disabled selected>Please enter your Province</option>
                            @foreach($provinces as $province)
                            <option value="{{$province->id}}">{{$province->name_th}}</option>
                            @endforeach
                          </select>
                          @error('province_id')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end select -->
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="select-style-1">
                        <label>District <span class="text-danger">*</span> </label>
                        <div class="select-position">
                          <select class="light-bg" required="required" name="district_id" id="district_select" style="width: 100%;" disabled>
                            <option disabled selected>Please enter your District</option>
                          </select>
                          @error('district_id')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end select -->
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="select-style-1">
                        <label>Sub District <span class="text-danger">*</span> </label>
                        <div class="select-position">
                          <select class="light-bg" required="required" name="subdistrict_id" id="subdistrict_select" style="width: 100%;" disabled>
                            <option disabled selected>Please enter your Subdistrict</option>
                          </select>
                          @error('subdistrict_id')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end select -->
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="input-style-1">
                        <label>Zip Code <span class="text-danger">*</span> </label>
                        <input type="text" value="{{old('zip_code')}}" placeholder="Please enter your zip code" id="zip_code" name="zip_code" required="required" data-parsley-maxlength="10" data-parsley-minlength="5" class="form-control" disabled>
                        @error('zip_code')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="input-style-1">
                        <label>Country <span class="text-danger">*</span> </label>
                        <input type="text" value="ไทย" placeholder="Please enter your country" name="country" required="required" class="form-control" disabled>
                        @error('country')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="input-style-1">
                        <label><i class="fa-solid fa-id-badge"></i> Occupation </label>
                        <input type="text" value="{{old('occupation')}}" placeholder="Please enter your Occupation" name="occupation" class="form-control" disabled>
                        @error('occupation')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="select-style-1">
                        <label><i class="fa-solid fa-people-group"></i> Member Group <span class="text-danger">*</span> </label>
                        <div class="select-position">
                          <select class="light-bg text-capitalize" required="required" name="group_id" disabled>
                            @if(count($patient_group) > 0)
                            @foreach($patient_group as $group)
                            <option class="text-capitalize" value="{{$group->patient_group_id}}" {{ old('group_id') == $group->patient_group_id ? "selected" :""}}>{{$group->group_name}}
                            </option>
                            @endforeach
                            @else
                            <option value="1">Normal</option>
                            @endif
                          </select>
                          @error('group_id')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-12">
                      <p><i class="fa-solid fa-image"></i> Image profile</p>
                      <img src="https://www.kindpng.com/picc/m/252-2524695_dummy-profile-image-jpg-hd-png-download.png" class="rounded-3 me-3" alt="" width="120" height="150" style="object-fit: cover;" id="image-output">
                      <span>
                        <label for="image_update" class="main-btn deactive-btn btn-hover rounded-3 py-2 px-4" disabled>
                          <i class="fa-solid fa-folder-open"></i> Upload Image
                          //อย่าลืม
                          <input type="hidden" name="old_image" value="">
                          <input type="file" name="image" id="image_update" hidden accept="image/png, image/jpg, image/jpeg, image/gif" disabled onchange="loadFile(event)">
                        </label>
                        <p class="text-muted small">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        @error('image')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </span>
                    </div>
                    <!-- end col -->
                  </div>
                  <!-- end col -->
                </div>
                <!-- end row -->

                <!-- Tab 2 -->
                <div class="tab-pane fade" id="nav-medical" role="tabpanel" aria-labelledby="nav-medical-tab">
                  <div class="d-flex justify-content-between">
                    <h4 class="mb-25 text-success"> <i class="fa-solid fa-book-medical"></i> Medical Info </h4>
                    <a href="#">
                      <button type="button" id="btn-edit" class="btn btn-primary btn-edit" style="height: 40px;"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                    </a>
                  </div>

                  <div class="row">

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Weight <span class="text-muted">(kg)</span> </label>
                        <input type="number" placeholder="Please enter your Weight" name="weight" data-parsley-minlength="0">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Height <span class="text-muted">(cm)</span> </label>
                        <input type="text" placeholder="Please enter your Height" name="height" data-parsley-minlength="0">
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="select-style-1">
                        <label>Blood Group</label>
                        <div class="select-position">
                          <select class="light-bg" name="blood_group">
                            <option disabled selected>Select Your Blood Group</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="O">O</option>
                            <option value="AB">AB</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="O-">O-</option>
                            <option value="AB-">AB-</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6">
                      <div class="input-style-1">
                        <label>Drug Allergies </label>
                        <textarea name="drug_allergies" id="" cols="30" rows="2" placeholder="Please enter your Drug Allergies"></textarea>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6">
                      <div class="input-style-1">
                        <label>Food Allergies </label>
                        <textarea name="food_allergies" id="" cols="30" rows="2" placeholder="Please enter your Food Allergies"></textarea>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Congenital Disease </label>
                        <textarea name="congenital_disease" id="" cols="30" rows="3" placeholder="Please enter your Congenital Disease"></textarea>
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
                          <input class="form-check-input pe-1" type="radio" value="2" id="smoker-regularly" name="smoker">
                          <label class="form-check-label" for="smoker-regularly">
                            <i class="fa-solid fa-check"></i> Regularly</label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="1" id="smoker-once" name="smoker">
                          <label class="form-check-label" for="smoker-once">
                            <i class="fa-solid fa-clock"></i> Once in a while </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="0" id="smoker-no" name="smoker">
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
                          <input class="form-check-input pe-1" type="radio" value="2" id="drinks-regularly" name="drinks">
                          <label class="form-check-label" for="drinks-regularly">
                            <i class="fa-solid fa-check"></i> Regularly </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="1" id="drinks-once" name="drinks">
                          <label class="form-check-label" for="drinks-once">
                            <i class="fa-solid fa-clock"></i> Once in a while </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="0" id="drinks-no" name="drinks">
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
                      <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="1" id="high_blood-yes" name="high_blood_pressure">
                          <label class="form-check-label" for="high_blood-yes">
                            <i class="fa-solid fa-check"></i> Yes </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="0" id="high_blood-no" name="high_blood_pressure">
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
                      <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="1" id="diabetic-yes" name="diabetic">
                          <label class="form-check-label" for="diabetic-yes">
                            <i class="fa-solid fa-check"></i> Yes </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="0" id="diabetic-no" name="diabetic">
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
                          <input class="form-check-input pe-1" type="radio" value="1" id="bleed_tendency-yes" name="bleed_tendency">
                          <label class="form-check-label" for="bleed_tendency-yes">
                            <i class="fa-solid fa-check"></i> Yes </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="0" id="bleed_tendency-no" name="bleed_tendency">
                          <label class="form-check-label" for="bleed_tendency-no">
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
                      <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="1" id="heart_deisease-yes" name="heart_deisease">
                          <label class="form-check-label" for="heart_deisease-yes">
                            <i class="fa-solid fa-check"></i> Yes </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="0" id="heart_deisease-no" name="heart_deisease">
                          <label class="form-check-label" for="heart_deisease-no">
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
                          <input class="form-check-input pe-1" type="radio" value="1" id="female_pregnant-yes" name="female_pregnant">
                          <label class="form-check-label" for="female_pregnant-yes">
                            <i class="fa-solid fa-check"></i> Yes </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="0" id="female_pregnant-no" name="female_pregnant">
                          <label class="form-check-label" for="female_pregnant-no">
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
                          <input class="form-check-input pe-1" type="radio" value="Walk-in" id="first_register_chanel-2" name="first_register_chanel">
                          <label class="form-check-label" for="first_register_chanel-2">
                            <i class="fa-solid fa-building-user"></i> Walk-in </label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="Call phone" id="first_register_chanel-1" name="first_register_chanel">
                          <label class="form-check-label" for="first_register_chanel-1">
                            <i class="fa-solid fa-phone"></i> Call phone</label>
                        </div>
                        <div class="form-check radio-style me-4">
                          <input class="form-check-input pe-1" type="radio" value="Online" id="first_register_chanel-0" name="first_register_chanel">
                          <label class="form-check-label" for="first_register_chanel-0">
                            <i class="fa-solid fa-globe"></i> Online </label>
                        </div>
                      </div>
                    </div>
                    <!-- end col -->
                    <hr class="m-0 mb-3">

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>High Risk Diseases </label>
                        <textarea name="high_risk_diseases" id="" cols="30" rows="2" placeholder="Please enter your High Risk Diseases"></textarea>
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Surgery </label>
                        <textarea name="surgery" id="" cols="30" rows="2" placeholder="Please enter your Surgery"></textarea>
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Accident </label>
                        <textarea name="accident" id="" cols="30" rows="2" placeholder="Please enter your Accident"></textarea>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6">
                      <div class="input-style-1">
                        <label>Medical History </label>
                        <textarea name="medical_history" id="" cols="30" rows="3" placeholder="Please enter your Medical History"></textarea>
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-6">
                      <div class="input-style-1">
                        <label>Current Medication </label>
                        <textarea name="current_medication" id="" cols="30" rows="3" placeholder="Please enter your Current Medication"></textarea>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Note : </label>
                        <textarea name="note" id="" cols="30" rows="5" placeholder="Note For Doctor"></textarea>
                        <input type="hidden" name="inquirer_id" value="{{Auth::user()->user_id}}">
                      </div>
                    </div>
                    <!-- end col -->


                  </div>
                  <!-- end row -->
                </div>

                <!-- Tab 3 -->
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                  <div class="d-flex justify-content-between">
                    <h4 class="mb-25 text-warning"><i class="fa-solid fa-triangle-exclamation"></i> Emergency Contact
                    </h4>
                    <a href="#">
                      <button type="button" id="btn-edit" class="btn btn-primary btn-edit" style="height: 40px;"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                    </a>
                  </div>
                  <div class="row">

                    <div class="col-sm-6 col-md-2">
                      <div class="select-style-1">
                        <label>Title</label>
                        <div class="select-position">
                          <select class="light-bg" name="emc_title">
                            <option value="นาง" {{ old('emc_title') == 'นาง' ? "selected" :""}}>นาง</option>
                            <option value="นาย" {{ old('emc_title') == 'นาย' ? "selected" :""}}>นาย</option>
                            <option value="นางสาว" {{ old('emc_title') == 'นางสาว' ? "selected" :""}}>นางสาว</option>
                            <option value="ดช." {{ old('emc_title') == 'ดช.' ? "selected" :""}}>ดช.</option>
                            <option value="ดญ." {{ old('emc_title') == 'ดญ.' ? "selected" :""}}>ดญ.</option>
                          </select>
                          @error('emc_title')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>First Name </label>
                        <input type="text" value="{{old('emc_fname')}}" placeholder="Please enter his first name" data-parsley-maxlength="255" name="emc_fname">
                        @error('emc_title')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Last Name</label>
                        <input type="text" value="{{old('emc_lname')}}" placeholder="Please enter his last name" data-parsley-maxlength="255" name="emc_lname">
                        @error('emc_lname')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-2">
                      <div class="select-style-1" style="max-width: 200px;">
                        <label>Relation </label>
                        <div class="select-position">
                          <select class="light-bg" name="emc_relation">
                            <option disabled selected>please select his Relation</option>
                            <option value="ญาติ" {{ old('emc_relation') == 'ญาติ' ? "selected" :""}}>ญาติ</option>
                            <option value="บิดา" {{ old('emc_relation') == 'บิดา' ? "selected" :""}}>บิดา</option>
                            <option value="มารดา" {{ old('emc_relation') == 'มารดา' ? "selected" :""}}>มารดา</option>
                            <option value="พี่น้อง" {{ old('emc_relation') == 'พี่น้อง' ? "selected" :""}}>พี่น้อง</option>
                            <option value="เพื่อน" {{ old('emc_relation') == 'เพื่อน' ? "selected" :""}}>เพื่อน</option>
                            <option value="คนรู้จัก" {{ old('emc_relation') == 'คนรู้จัก' ? "selected" :""}}>คนรู้จัก</option>
                          </select>
                          @error('emc_relation')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <!-- end col -->


                    <div class="col-sm-6 col-md-4">
                      <div class="input-style-1">
                        <label>Phone </label>
                        <input type="text" placeholder="Please enter his phone" id="emc_phone" name="emc_phone" value="{{old('emc_phone')}}">
                        @error('emc_phone')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Address </label>
                        <textarea name="emc_address" placeholder="Please enter his address" id="" cols="30" rows="4" class="form-control">old('emc_address')</textarea>
                        @error('emc_address')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="select-style-1">
                        <label>Province <span class="text-danger">*</span> </label>
                        <div class="select-position">
                          <select class="light-bg" name="emc_province_id" id="emc_province_select" style="width: 100%;">
                            <option disabled selected>Please enter his Province</option>
                            @foreach($provinces as $province)
                            <option value="{{$province->id}}">{{$province->name_th}}</option>
                            @endforeach
                          </select>
                          @error('emc_province_id')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end select -->
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="select-style-1">
                        <label>District <span class="text-danger">*</span> </label>
                        <div class="select-position">
                          <select class="light-bg" name="emc_district_id" id="emc_district_select" style="width: 100%;">
                            <option disabled selected>Please enter his District</option>
                          </select>
                          @error('emc_district_id')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end select -->
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="select-style-1">
                        <label>Sub District <span class="text-danger">*</span> </label>
                        <div class="select-position">
                          <select class="light-bg" name="emc_subdistrict_id" id="emc_subdistrict_select" style="width: 100%;">
                            <option disabled selected>Please enter his Subdistrict</option>
                          </select>
                          @error('emc_subdistrict_id')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end select -->
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="input-style-1">
                        <label>Zip Code <span class="text-danger">*</span> </label>
                        <input type="text" value="{{old('emc_zip_code')}}" placeholder="Please enter his zip code" id="emc_zip_code" name="emc_zip_code" data-parsley-maxlength="10" data-parsley-minlength="5" class="form-control">
                        @error('emc_zip_code')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-sm-6 col-md-3">
                      <div class="input-style-1">
                        <label>Country </label>
                        <input type="text" value="{{old('emc_country')}}" placeholder="Please enter his country" name="emc_country" id="emc_country" class="form-control">
                        @error('emc_country')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
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
      var textarea = document.querySelectorAll('textarea');
      for (var i = 0; i < textarea.length; i++) {
        textarea[i].disabled = false;
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