@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('js/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/flatpickr/dist/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/patient.css') }}">

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

  .select2-container--default {
    background-color: #fff !important;
  }
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
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="title d-flex align-items-center flex-wrap mb-30 ">
              <h2 class="h2"> <a href=""><small class="text-muted"><i class="fa-solid fa-users"></i> Patients /
                  </small></a>
                Patient Details</h2>
            </div>
          </div>

          <!-- end col -->
          <div class="col-md-6 text-end">
            <a href="#!" data-id="{{$patient->patient_id}}" data-name="{{$patient->title}} {{$patient->fname}} {{$patient->lname}}" class="main-btn primary-btn-outline btn-hover btn-sm btn-create-appointment" data-bs-toggle="modal" data-bs-target="#modal_create">
              <i class="fa-solid fa-calendar-plus"></i> Appointment
            </a>
          </div><!-- end col -->
        </div> <!-- end row -->
      </div>
      <!-- title-wrapper -->


      <!-- ========== table-wrapper start ========== -->
      <div class="table-layout-wrapper">
        <div class="row gx-2">

          <!-- Profile Card -->
          <div class="col-md-4 col-xxl-3">
            <div class="card-style mb-30 px-1 px-sm-2 px-md-3">
              <!-- <img
                src="https://previews.123rf.com/images/djvstock/djvstock1705/djvstock170517800/79273286-nurse-avatar-profile-icon-vector-illustration-graphic-design.jpg"
                alt="" class="img-fluid mx-auto d-block" style="max-width: 200px;"> -->
              <img src="{{asset('image/uploads/'.$patient->image)}}" class="rounded mx-auto d-block" style="width: 80%;" alt="" />
              <h5 class="text-center mt-3 fw-normal text-primary">{{$patient->opd_id}}</h5>
              <h4 class="text-center mt-2">{{$patient->title}} {{$patient->fname}} {{$patient->lname}} <small class="text-muted">{{($patient->nname)?'('.$patient->nname.')':''}}</small></h4>
              <div class="label-icon primary mx-auto mt-2">
                Normal
              </div>
              <table class="table table-striped mt-3">
                <tbody>
                  <tr>
                    <th class=" fw-normal">FULL NAME:</th>
                    <td class="">{{$patient->title}} {{$patient->fname}} {{$patient->lname}}</td>
                  </tr>
                  <tr>
                    <th class=" fw-normal">ID card:</th>
                    <td class="">{{$patient->id_card}}</td>
                  </tr>
                  <tr>
                    <th class=" fw-normal">BIRTH DATE:</th>
                    <td class="">{{$patient->birthdate}}</td>
                  </tr>
                  <tr>
                    <th class=" fw-normal">AGE:</th>
                    <td class="">{{$patient->age}}</td>
                  </tr>
                  <tr>
                    <th class=" fw-normal">SEX:</th>
                    <td class="">{{$patient->sex}}</td>
                  </tr>
                  <tr>
                    <th class=" fw-normal">PHONE:</th>
                    <td class="">{{$patient->phone}}</td>
                  </tr>
                  <tr>
                    <th class=" fw-normal">BloodGroup:</th>
                    <td class="">{{($patient->blood_group)?$patient->blood_group :'-'}}</td>
                  </tr>
                  <tr>
                    <th class=" fw-normal">DRUG ALLERGIES:</th>
                    <td class="">{{($patient->drug_allergies)?$patient->drug_allergies :'-'}}</td>
                  </tr>
                  <tr>
                    <th class=" fw-normal small">CONGENITAL_DISEASE:</th>
                    <td class="">{{($patient->congenital_disease)?$patient->congenital_disease :'-'}}</td>
                  </tr>
                  <tr>
                    <th class=" fw-normal">NOTE:</th>
                    <td class="">{{($patient->note)?$patient->note :'-'}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Detail Card -->
          <div class="col-md-8 col-xxl-9">
            <nav class="ms-1">
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active py-3 px-2 px-md-3" id="nav-general-tab" data-bs-toggle="tab" data-bs-target="#nav-general" type="button" role="tab" aria-controls="nav-general" aria-selected="true"><i class="fa-solid fa-user"></i> General</button>
                <button class="nav-link py-3 px-2 px-md-3" id="nav-medical-tab" data-bs-toggle="tab" data-bs-target="#nav-medical" type="button" role="tab" aria-controls="nav-medical" aria-selected="false"><i class="fa-solid fa-book-medical"></i> Medical Info</button>
                <button class="nav-link py-3 px-2 px-md-3" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa-solid fa-triangle-exclamation"></i> Emergency Contact</button>
                <button class="nav-link py-3 px-2 px-md-3" id="nav-appointment-tab" data-bs-toggle="tab" data-bs-target="#nav-appointment" type="button" role="tab" aria-controls="nav-appointment" aria-selected="false"><i class="fa-solid fa-calendar-days"></i> Appointments</button>
              </div>
            </nav>
            <div class="card-style border-top-0">
              <form action="{{route('admin.patient.update')}}" method="post" enctype="multipart/form-data" id="form_edit_patient">
                @csrf
                @method('put')
                <input type="hidden" name="patient_id" value="{{$patient->patient_id}}">
                <input type="hidden" name="patient_emc_id" value="{{$patient_emc->patient_emc_id}}">
                <input type="hidden" name="patient_medical_info_id" value="{{$patient->patient_medical_info_id}}">
                <input type="hidden" name="address_id" value="{{$patient->address_id}}">
                <input type="hidden" name="emc_address_id" value="{{$patient_emc->emc_address_id}}">
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
                          <label>Title </label>
                          <div class="select-position">
                            <select class="light-bg" required="required" name="title" disabled>
                              <option {{($patient->title == 'นาง')? 'selected' : ''  }} value="นาง">นาง</option>
                              <option {{($patient->title == 'นาย')? 'selected' : ''  }} value="นาย">นาย</option>
                              <option {{($patient->title == 'นางสาว')? 'selected' : ''  }} value="นางสาว">นางสาว</option>
                              <option {{($patient->title == 'ดช')? 'selected' : ''  }} value="ดช.">ดช.</option>
                              <option {{($patient->title == 'ดญ')? 'selected' : ''  }} value="ดญ.">ดญ.</option>
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
                          <label>First Name </label>
                          <input type="text" value="{{$patient->fname}}" name="fname" required="required" data-parsley-maxlength="100" class="form-control" placeholder="Please enter First Name" disabled>
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
                          <label>Last Name </label>
                          <input type="text" value="{{$patient->lname}}" name="lname" required="required" data-parsley-maxlength="255" class="form-control" placeholder="Please enter Last Name" disabled>
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
                          <input type="text" value="{{$patient->nname}}" name="nname" data-parsley-maxlength="50" placeholder="Please enter Nick Name" disabled>
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
                          <label><i class="fa-solid fa-address-card"></i> ID Card Number </label>
                          <input type="text" value="{{$patient->id_card}}" placeholder="Please enter ID Card Number" name="id_card" required="required" id="id_card" class="form-control" disabled data-parsley-length="[17, 17]" data-parsley-error-message="This value length is invalid. It should be 13 characters long.">
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
                          <label>Date of Birth </label>
                          <input type="date" required="required" id="dob" name="birthdate" value="{{$patient->birthdate}}" disabled placeholder="Please enter Date of Birth">
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
                          <label>Age </label>
                          <input type="number" value="{{$patient->age}}" placeholder="Age automatically calculate" name="age" style="max-width: 200px;" required="required" data-parsley-length="[1, 120]" id="age" class="form-control" disabled>
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
                            <input class="form-check-input" type="radio" value="ชาย" id="radio-1" name="sex" required="required" {{ ($patient->sex == 'ชาย') ? 'checked' :''}} disabled>
                            <label class="form-check-label" for="radio-1">
                              <i class="fa-solid fa-mars"></i> ชาย </label>
                          </div>
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input" type="radio" value="หญิง" id="radio-2" name="sex" {{ ($patient->sex == 'หญิง') ?'checked' :''}} disabled>
                            <label class="form-check-label" for="radio-2">
                              <i class="fa-solid fa-venus"></i> หญิง </label>
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
                          <label>Phone Number </label>
                          <input type="text" value="{{$patient->phone}}" placeholder="Please enter Phone Number" name="phone" required="required" data-parsley-length="[9, 13]" id="phone_number" class="form-control" disabled>
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
                          <input type="email" value="{{$patient->email}}" placeholder="Please enter Email" name="email" data-parsley-trigger="change" data-parsley-maxlength="255" class="form-control" disabled>
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
                          <input type="text" value="{{$patient->id_line}}" name="id_line" data-parsley-maxlength="100" class="form-control" placeholder="Please enter ID Line" disabled>
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
                          <input type="text" value="{{$patient->nationality}}" name="nationality" class="form-control" placeholder="Please enter Nationality" disabled data-parsley-maxlength="50">
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
                          <input type="text" value="{{$patient->race}}" name="race" class="form-control" placeholder="Please enter Race" disabled data-parsley-maxlength="50">
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
                          <input type="text" value="{{$patient->religion}}" name="religion" class="form-control" placeholder="Please enter Religion" disabled data-parsley-maxlength="50">
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
                          <label>Address </label>
                          <textarea name="address" placeholder="Please enter address" id="" cols="30" rows="4" required="required" class="form-control" disabled>{{($patient->address)}}</textarea>
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
                          <label>Province </label>
                          <div class="select-position">
                            <select class="light-bg" required="required" name="province_id" id="province_select" style="width: 100%;" disabled>
                              <option disabled selected>Please enter Province</option>
                              @foreach($provinces as $province)
                              <option value="{{$province->id}}" {{($patient->province_id == $province->id)?'selected':''}}>{{$province->name_th}}</option>
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
                          <label>District </label>
                          <div class="select-position">
                            <select class="light-bg" required="required" name="district_id" id="district_select" style="width: 100%;" disabled>
                              <option selected value="{{$patient->district_id}}">{{$patient->district_name}}</option>
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
                          <label>Sub District </label>
                          <div class="select-position">
                            <select class="light-bg" required="required" name="subdistrict_id" id="subdistrict_select" style="width: 100%;" disabled>
                              <option selected value="{{$patient->subdistrict_id}}">{{$patient->subdistrict_name}}</option>
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
                          <label>Zip Code </label>
                          <input type="text" value="{{$patient->zip_code}}" placeholder="Please enter zip code" id="zip_code" name="zip_code" required="required" data-parsley-length="[0, 10]" class="form-control" disabled>
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
                          <label>Country </label>
                          <input type="text" value="{{$patient->country}}" placeholder="Please enter country" name="country" required="required" class="form-control" disabled data-parsley-maxlength="40">
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
                          <input type="text" value="{{$patient->occupation}}" placeholder="Please enter Occupation" name="occupation" class="form-control" disabled data-parsley-maxlength="50">
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
                          <label><i class="fa-solid fa-people-group"></i> Member Group </label>
                          <div class="select-position">
                            <select class="light-bg text-capitalize" required="required" name="group_id" disabled>
                              @if(count($patient_group) > 0)
                              @foreach($patient_group as $group)
                              <option class="text-capitalize" value="{{$group->patient_group_id}}" {{ ($patient->group_id == $group->patient_group_id) ? "selected" :""}}>{{$group->group_name}}
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

                      <div class="col-sm-6 col-md-3">
                        <div class="select-style-1">
                          <label><i class="fa-solid fa-clipboard-check"></i> Patient Status </label>
                          <div class="select-position">
                            <select class="light-bg text-capitalize" name="patient_status" disabled required="required">
                              <option class="text-capitalize" {{($patient->patient_status == 1)?'selected':''}} value="1">Normal</option>
                              <option class="text-capitalize" {{($patient->patient_status == 0)?'selected':''}} value="0">Abnormal</option>
                            </select>
                            @error('patient_status')
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
                        <img src="{{asset('image/uploads/'.$patient->image)}}" class="rounded-3 me-3" alt="" width="120" height="150" style="object-fit: cover;" id="image-output">
                        <span>
                          <label for="image_update" class="main-btn deactive-btn btn-hover rounded-3 py-2 px-4">
                            <i class="fa-solid fa-folder-open"></i> Upload Image
                            <input type="hidden" name="old_image" value="{{$patient->image}}">
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
                          <input type="number" value="{{$patient->weight}}" placeholder="Please enter Weight" name="weight" data-parsley-length="[0, 500]" disabled>
                          @error('weight')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Height <span class="text-muted">(cm)</span> </label>
                          <input type="text" value="{{$patient->height}}" placeholder="Please enter Height" name="height" data-parsley-length="[0, 250]" disabled>
                          @error('height')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="select-style-1">
                          <label>Blood Group</label>
                          <div class="select-position">
                            <select class="light-bg" name="blood_group" disabled>
                              <option selected disabled>Select Your Blood Group</option>
                              <option {{($patient->blood_group == 'A')?'selected':''}} value="A">A</option>
                              <option {{($patient->blood_group == 'B')?'selected':''}} value="B">B</option>
                              <option {{($patient->blood_group == 'O')?'selected':''}} value="O">O</option>
                              <option {{($patient->blood_group == 'AB')?'selected':''}} value="AB">AB</option>
                              <option {{($patient->blood_group == 'A-')?'selected':''}} value="A-">A-</option>
                              <option {{($patient->blood_group == 'B-')?'selected':''}} value="B-">B-</option>
                              <option {{($patient->blood_group == 'O-')?'selected':''}} value="O-">O-</option>
                              <option {{($patient->blood_group == 'AB-')?'selected':''}} value="AB-">AB-</option>
                            </select>
                            @error('blood_group')
                            <small class="text-danger">
                              {{ $message }}
                            </small>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label>Drug Allergies </label>
                          <textarea name="drug_allergies" id="" cols="30" rows="2" placeholder="Please enter Drug Allergies" disabled>{{$patient->drug_allergies}}</textarea>
                          @error('drug_allergies')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label>Food Allergies </label>
                          <textarea name="food_allergies" id="" cols="30" rows="2" placeholder="Please enter Food Allergies" disabled>{{$patient->food_allergies}}</textarea>
                          @error('food_allergies')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Congenital Disease </label>
                          <textarea name="congenital_disease" id="" cols="30" rows="3" placeholder="Please enter Congenital Disease" disabled>{{$patient->congenital_disease}}</textarea>
                          @error('congenital_disease')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label for="">Smoker</label>
                          @error('smoker')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="2" id="smoker-regularly" name="smoker" {{($patient->smoker == '2')?'checked':''}} disabled>
                            <label class="form-check-label" for="smoker-regularly">
                              <i class="fa-solid fa-check"></i> Regularly</label>
                          </div>
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="1" id="smoker-once" name="smoker" {{($patient->smoker == '1')?'checked':''}}>
                            <label class="form-check-label" for="smoker-once">
                              <i class="fa-solid fa-clock"></i> Once in a while </label>
                          </div>
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="0" id="smoker-no" name="smoker" {{($patient->smoker == '0')?'checked':''}}>
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
                          @error('drinks')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="2" id="drinks-regularly" name="drinks" {{($patient->drinks == '2')?'checked':''}} disabled>
                            <label class="form-check-label" for="drinks-regularly">
                              <i class="fa-solid fa-check"></i> Regularly </label>
                          </div>
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="1" id="drinks-once" name="drinks" {{($patient->drinks == '1')?'checked':''}}>
                            <label class="form-check-label" for="drinks-once">
                              <i class="fa-solid fa-clock"></i> Once in a while </label>
                          </div>
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="0" id="drinks-no" name="drinks" {{($patient->drinks == '0')?'checked':''}}>
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
                          @error('high_blood_pressure')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-sm-6">
                        <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="1" id="high_blood-yes" name="high_blood_pressure" {{($patient->high_blood_pressure == '1')?'checked':''}} disabled>
                            <label class="form-check-label" for="high_blood-yes">
                              <i class="fa-solid fa-check"></i> Yes </label>
                          </div>
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="0" id="high_blood-no" name="high_blood_pressure" {{($patient->high_blood_pressure == '0')?'checked':''}}>
                            <label class="form-check-label" for="high_blood-no">
                              <i class="fa-solid fa-xmark"></i> No </label>
                          </div>
                        </div>
                      </div>
                      <hr class="m-0 mb-3">

                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label for="">Diabetic </label>
                          @error('diabetic')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-sm-6">
                        <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="1" id="diabetic-yes" name="diabetic" {{($patient->diabetic == '1')?'checked':''}} disabled>
                            <label class="form-check-label" for="diabetic-yes">
                              <i class="fa-solid fa-check"></i> Yes </label>
                          </div>
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="0" id="diabetic-no" name="diabetic" {{($patient->diabetic == '0')?'checked':''}}>
                            <label class="form-check-label" for="diabetic-no">
                              <i class="fa-solid fa-xmark"></i> No </label>
                          </div>
                        </div>
                      </div>
                      <hr class="m-0 mb-3">

                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label for="">Bleed tendency </label>
                          @error('bleed_tendency')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-sm-6">
                        <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="1" id="bleed_tendency-yes" name="bleed_tendency" {{($patient->bleed_tendency == '1')?'checked':''}} disabled>
                            <label class="form-check-label" for="bleed_tendency-yes">
                              <i class="fa-solid fa-check"></i> Yes </label>
                          </div>
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="0" id="bleed_tendency-no" name="bleed_tendency" {{($patient->bleed_tendency == '0')?'checked':''}}>
                            <label class="form-check-label" for="bleed_tendency-no">
                              <i class="fa-solid fa-xmark"></i> No </label>
                          </div>
                        </div>
                      </div>
                      <hr class="m-0 mb-3">

                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label for="">Heart disease </label>
                          @error('heart_disease')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-sm-6">
                        <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="1" id="heart_disease-yes" name="heart_disease" {{($patient->heart_disease == '1')?'checked':''}} disabled>
                            <label class="form-check-label" for="heart_disease-yes">
                              <i class="fa-solid fa-check"></i> Yes </label>
                          </div>
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="0" id="heart_disease-no" name="heart_disease" {{($patient->heart_disease == '0')?'checked':''}}>
                            <label class="form-check-label" for="heart_disease-no">
                              <i class="fa-solid fa-xmark"></i> No </label>
                          </div>
                        </div>
                      </div>
                      <hr class="m-0 mb-3">

                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label for="">Female Pregnant </label>
                          @error('female_pregnant')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="1" id="female_pregnant-yes" name="female_pregnant" {{($patient->female_pregnant == '1')?'checked':''}} disabled>
                            <label class="form-check-label" for="female_pregnant-yes">
                              <i class="fa-solid fa-check"></i> Yes </label>
                          </div>
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="0" id="female_pregnant-no" name="female_pregnant" {{($patient->female_pregnant == '0')?'checked':''}}>
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
                          @error('first_register_chanel')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-start justify-content-md-end">
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="Walk-in" id="first_register_chanel-2" name="first_register_chanel" {{($patient->first_register_chanel == 'Walk-in')?'checked':''}} disabled>
                            <label class="form-check-label" for="first_register_chanel-2">
                              <i class="fa-solid fa-building-user"></i> Walk-in </label>
                          </div>
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="Call phone" id="first_register_chanel-1" name="first_register_chanel" {{($patient->first_register_chanel == 'Call phone')?'checked':''}}>
                            <label class="form-check-label" for="first_register_chanel-1">
                              <i class="fa-solid fa-phone"></i> Call phone</label>
                          </div>
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input pe-1" type="radio" value="Online" id="first_register_chanel-0" name="first_register_chanel" {{($patient->first_register_chanel == 'Online')?'checked':''}}>
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
                          <textarea name="high_risk_diseases" id="" cols="30" rows="2" placeholder="Please enter High Risk Diseases" disabled>{{$patient->high_risk_diseases}}</textarea>
                          @error('high_risk_diseases')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Surgery </label>
                          <textarea name="surgery" id="" cols="30" rows="2" placeholder="Please enter Surgery" disabled>{{$patient->surgery}}</textarea>
                          @error('surgery')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Accident </label>
                          <textarea name="accident" id="" cols="30" rows="2" placeholder="Please enter Accident" disabled>{{$patient->accident}}</textarea>
                          @error('accident')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label>Medical History </label>
                          <textarea name="medical_history" id="" cols="30" rows="3" placeholder="Please enter Medical History" disabled>{{$patient->medical_history}}</textarea>
                          @error('medical_history')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label>Current Medication </label>
                          <textarea name="current_medication" id="" cols="30" rows="3" placeholder="Please enter Current Medication" disabled>{{$patient->current_medication}}</textarea>
                          @error('current_medication')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Note : </label>
                          <textarea name="note" id="note_editor" cols="30" rows="5" placeholder="Note For Doctor" disabled>{{$patient->note}}</textarea>
                          @error('note')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
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
                            <select class="light-bg" name="emc_title" disabled>
                              <option disabled selected>Please select his title </option>
                              <option value="นาง" {{ ($patient_emc->emc_title == 'นาง') ? "selected" :""}}>นาง</option>
                              <option value="นาย" {{ ($patient_emc->emc_title == 'นาย') ? "selected" :""}}>นาย</option>
                              <option value="นางสาว" {{ ($patient_emc->emc_title == 'นางสาว') ? "selected" :""}}>นางสาว</option>
                              <option value="ดช." {{ ($patient_emc->emc_title == 'ดช.') ? "selected" :""}}>ดช.</option>
                              <option value="ดญ." {{ ($patient_emc->emc_title == 'ดญ.') ? "selected" :""}}>ดญ.</option>
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
                          <input type="text" value="{{$patient_emc->emc_fname}}" placeholder="Please enter first name" data-parsley-maxlength="100" name="emc_fname" disabled>
                          @error('emc_fname')
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
                          <input type="text" value="{{$patient_emc->emc_lname}}" placeholder="Please enter last name" data-parsley-maxlength="255" name="emc_lname" disabled>
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
                            <select class="light-bg" name="emc_relation" disabled>
                              <option disabled selected>please select his Relation</option>
                              <option value="ญาติ" {{ ($patient_emc->emc_relation == 'ญาติ') ? "selected" :""}}>ญาติ</option>
                              <option value="บิดา" {{ ($patient_emc->emc_relation == 'บิดา') ? "selected" :""}}>บิดา</option>
                              <option value="มารดา" {{ ($patient_emc->emc_relation == 'มารดา') ? "selected" :""}}>มารดา</option>
                              <option value="พี่น้อง" {{ ($patient_emc->emc_relation == 'พี่น้อง') ? "selected" :""}}>พี่น้อง</option>
                              <option value="เพื่อน" {{ ($patient_emc->emc_relation == 'เพื่อน') ? "selected" :""}}>เพื่อน</option>
                              <option value="คนรู้จัก" {{ ($patient_emc->emc_relation == 'คนรู้จัก') ? "selected" :""}}>คนรู้จัก</option>
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
                          <input type="text" placeholder="Please enter phone" id="emc_phone" name="emc_phone" value="{{$patient_emc->emc_phone}}" data-parsley-length="[9, 13]" disabled>
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
                          <textarea name="emc_address" placeholder="Please enter address" id="" cols="30" rows="4" class="form-control" disabled>{{$patient_emc->address}}</textarea>
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
                          <label>Province </label>
                          <div class="select-position">
                            <select class="light-bg" name="emc_province_id" id="emc_province_select" style="width: 100%;" disabled>
                              <option selected disabled value="">Please enter Province</option>
                              @foreach($provinces as $province)
                              <option value="{{$province->id}}" {{($patient_emc->province_id == $province->id)?'selected':''}}>{{$province->name_th}}</option>
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
                          <label>District </label>
                          <div class="select-position">
                            <select class="light-bg" name="emc_district_id" id="emc_district_select" style="width: 100%;" disabled>
                              @if(empty($patient_emc->district_id))
                              <option selected disabled value="">Please enter District</option>
                              @else
                              <option selected value="{{$patient_emc->district_id}}">{{$patient_emc->district_name}}</option>
                              @endif
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
                          <label>Sub District </label>
                          <div class="select-position">
                            <select class="light-bg" name="emc_subdistrict_id" id="emc_subdistrict_select" style="width: 100%;" disabled>
                              @if(empty($patient_emc->subdistrict_id))
                              <option selected disabled value="">Please enter Subdistrict</option>
                              @else
                              <option selected value="{{$patient_emc->subdistrict_id}}">{{$patient_emc->subdistrict_name}}</option>
                              @endif
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
                          <label>Zip Code </label>
                          <input type="text" value="{{$patient_emc->zip_code}}" placeholder="Please enter zip code" id="emc_zip_code" name="emc_zip_code" data-parsley-length="[0, 10]" class="form-control" disabled>
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
                          <input type="text" value="{{$patient_emc->country}}" placeholder="Please enter country" name="emc_country" id="emc_country" data-parsley-maxlength="40" class="form-control" disabled>
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

                  <!-- Tap 4 -->
                  <div class="tab-pane fade" id="nav-appointment" role="tabpanel" aria-labelledby="nav-appointment-tab">
                    <div class="d-flex justify-content-between">
                      <h4 class="mb-25 text-warning"><i class="fa-solid fa-calendar-days"></i> Appointments
                      </h4>
                    </div>

                    <!-- Table  -->
                    <div class="table-wrapper table-responsive pb-3">
                      <table class="table appointment-table">
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
                              @if($appointment->appointment_status !== 4 && $appointment->appointment_status !== 3)
                              <a href="{{route('admin.appointment.change_status',$appointment->appointment_id)}}" class="main-btn primary-btn p-1 me-3">
                                <i class="fa-solid fa-check"></i> Check
                              </a>
                              @endif
                              <div class="dropdown">
                                <a class="text-muted dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <li><a class="dropdown-item btn-view" href="#" data-id="{{$appointment->appointment_id}}"><i class="fa-solid fa-eye"></i> View</a>
                                  <li><a class="dropdown-item" href="{{route('admin.appointment.print',$appointment->appointment_id)}}"><i class="fa-solid fa-print"></i> Print</a>
                                  <li><a class="dropdown-item btn-edit" href="#" data-id="{{$appointment->appointment_id}}" data-bs-toggle="modal" data-bs-target="#modal_update"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                  </li>
                                  @if($appointment->appointment_status !== 4 && $appointment->appointment_status !== 3)
                                  <li><a class="dropdown-item btn-cancel" href="#" data-id="{{$appointment->appointment_id}}" data-bs-toggle="modal" data-bs-target="#modal_cancel"><i class="fa-solid fa-calendar-xmark"></i> Cancel</a></li>
                                  @endif
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
                  <!-- end row -->
                </div>

                <div class="button-group mt-4">
                  <button type="submit" id="btn-submit" class="main-btn primary-btn btn-hover col-12 d-none">Save Change</button>
                </div>
              </form>


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

<!-- Modal create Appointment-->
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
                <div class="input-style-1">
                  <label>Patient <span class="text-danger">*</span> </label>
                  <input type="hidden" class="appointment_patient_id" name="patient_id" value="{{old('patient_id')}}">
                  <input type="text" class="appointment_patient_name" name="" value="{{old('patient_id')}}" readonly disabled>
                  @error('patient_id')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
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
                  <textarea rows="4" cols="30" name="reason_for_appointment" required="required" data-parsley-maxlength="100" class="form-control" placeholder="Please enter First Name"></textarea>
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
                  <textarea rows="4" cols="30" id="doctor_comment" name="doctor_comment" data-parsley-maxlength="100" class="form-control" placeholder="Please enter First Name"></textarea>
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
<!-- Modal cancel Appointment-->
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
<!-- Modal update Appointment-->
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
                <div class="input-style-1">
                  <label>Patient <span class="text-danger">*</span> </label>
                  <input type="hidden" class="" name="patient_id" value="{{$patient->patient_id}}">
                  <input type="text" class="" name="" value="{{$patient->title}} {{$patient->fname}} {{$patient->lname}}" readonly disabled>
                  @error('patient_id')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
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
                  <textarea rows="4" cols="30" name="reason_for_appointment" required="required" class="form-control e_reason_for_appointment" placeholder="Please enter First Name"></textarea>
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
                  <textarea rows="4" cols="30" id="e_doctor_comment" name="doctor_comment" class="form-control e_doctor_comment" placeholder="Please enter First Name"></textarea>
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
<!-- Modal View Appointment-->
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
<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('js/cleave.js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('js/parsleyjs/dist/parsley.min.js') }}"></script>
<script src="{{ asset('js/ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('js/admin/patient/patient_detail.js') }}"></script>
@endsection