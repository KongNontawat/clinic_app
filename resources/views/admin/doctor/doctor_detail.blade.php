@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('js/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/flatpickr/dist/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/doctor.css') }}">

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
  background-color: #fff!important;
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
            <div class="title d-flex align-items-center flex-wrap mb-30">
              <h2 class="h2"> <a href=""><small class="text-muted"><i class="fa-solid fa-user-doctor"></i> doctors /
                  </small></a>
                doctor Details</h2>
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

          <!-- Profile Card -->
          <div class="col-12">
            <div class="card-style mb-30">
              <div class="row">

                <div class="col-md-6 col-lg-3">
                  <img src="{{asset('image/uploads/'.$doctor->image)}}" class="rounded mx-auto d-block" style="width: 80%;" alt="" />
                </div>
                <div class="col-md-6 col-lg-9 mt-4 mt-lg-2">
                  <h3 class="mt-2">{{$doctor->title}} {{$doctor->fname}} {{$doctor->lname}} <small class="text-muted">{{($doctor->nname)?'('.$doctor->nname.')':''}}</small></h3>
                  <div class="label-icon sky my-2">
                    Doctor
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <p> <span class="text-muted my-1">FULL NAME : </span> <span class="fs-5">{{$doctor->title}} {{$doctor->fname}} {{$doctor->lname}}</span></p> 
                      <p> <span class="text-muted my-1">BIRTH DATE : </span> <span class="fs-5">{{$doctor->birthdate}}</span></p> 
                      <p> <span class="text-muted my-1">AGE : </span> <span class="fs-5">{{$doctor->age}}</span></p> 
                      <p> <span class="text-muted my-1">SEX : </span> <span class="fs-5">{{$doctor->sex}}</span></p> 
                      <p> <span class="text-muted my-1">PHONE : </span> <span class="fs-5">{{$doctor->phone}}</span></p> 
                    </div>
                    <div class="col-sm-6">
                      <p> <span class="text-muted my-1">EMAIL : </span> <span class="fs-5">{{$doctor->email}}</span></p> 
                      <p> <span class="text-muted my-1">ID LINE : </span> <span class="fs-5">{{$doctor->id_line}}</span></p> 
                      <p> <span class="text-muted my-1">Position : </span> <span class="fs-5">{{$doctor->position}}</span></p> 
                      <p> <span class="text-muted my-1">Specialize : </span> <span class="fs-5">{{$doctor->specialize}}</span></p> 
                      <p> <span class="text-muted my-1">In Hospital : </span> <span class="fs-5">{{$doctor->in_hospital}}</span></p> 
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <!-- Detail Card -->
          <div class="col-12">
            <nav class="ms-1">
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active py-3 px-2 px-md-3" id="nav-general-tab" data-bs-toggle="tab" data-bs-target="#nav-general" type="button" role="tab" aria-controls="nav-general" aria-selected="true"><i class="fa-solid fa-user"></i> General</button>
                <!-- <button class="nav-link py-3 px-2 px-md-3" id="nav-medical-tab" data-bs-toggle="tab" data-bs-target="#nav-medical" type="button" role="tab" aria-controls="nav-medical" aria-selected="false"><i class="fa-solid fa-book-medical"></i> Medical Info</button>
                <button class="nav-link py-3 px-2 px-md-3" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa-solid fa-triangle-exclamation"></i> Emergency Contact</button>
                <button class="nav-link py-3 px-2 px-md-3" id="nav-incident-tab" data-bs-toggle="tab" data-bs-target="#nav-incident" type="button" role="tab" aria-controls="nav-incident" aria-selected="false"><i class="fa-solid fa-clock-rotate-left"></i> Incident</button> -->
              </div>
            </nav>
            <div class="card-style border-top-0">
              <form action="{{route('admin.doctor.update')}}" method="post" enctype="multipart/form-data" id="form_edit_doctor">
                @csrf
                @method('put')
                <input type="hidden" name="doctor_id" value="{{$doctor->doctor_id}}">
                <input type="hidden" name="address_id" value="{{$doctor->address_id}}">

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
                              <option {{($doctor->title == 'นาง')? 'selected' : ''  }} value="นาง">นาง</option>
                              <option {{($doctor->title == 'นาย')? 'selected' : ''  }} value="นาย">นาย</option>
                              <option {{($doctor->title == 'นางสาว')? 'selected' : ''  }} value="นางสาว">นางสาว</option>
                              <option {{($doctor->title == 'ดช')? 'selected' : ''  }} value="ดช.">ดช.</option>
                              <option {{($doctor->title == 'ดญ')? 'selected' : ''  }} value="ดญ.">ดญ.</option>
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

                      <div class="col-sm-6 col-md-5">
                        <div class="input-style-1">
                          <label>First Name </label>
                          <input type="text" value="{{$doctor->fname}}" name="fname" required="required" data-parsley-maxlength="100" class="form-control" placeholder="Please enter First Name" disabled>
                          @error('fname')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-5">
                        <div class="input-style-1">
                          <label>Last Name </label>
                          <input type="text" value="{{$doctor->lname}}" name="lname" required="required" data-parsley-maxlength="255" class="form-control" placeholder="Please enter Last Name" disabled>
                          @error('lname')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-3">
                        <div class="input-style-1">
                          <label>Nick Name </label>
                          <input type="text" value="{{$doctor->nname}}" name="nname" data-parsley-maxlength="50" placeholder="Please enter Nick Name" disabled>
                          @error('nname')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-6">
                        <div class="input-style-1">
                          <label>Date of Birth </label>
                          <input type="date" required="required" id="dob" name="birthdate" value="{{$doctor->birthdate}}" disabled placeholder="Please enter Date of Birth">
                          @error('birthdate')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-3">
                        <div class="input-style-1">
                          <label>Age </label>
                          <input type="number" value="{{$doctor->age}}" placeholder="Age automatically calculate" name="age" required="required" 	data-parsley-length="[1, 120]" id="age" class="form-control" disabled>
                          @error('age')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4 d-flex align-items-center">
                        <div class="input-style-1 d-flex mt-2">
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input" type="radio" value="ชาย" id="radio-1" name="sex" required="required" {{ ($doctor->sex == 'ชาย') ? 'checked' :''}} disabled>
                            <label class="form-check-label" for="radio-1">
                              <i class="fa-solid fa-mars"></i> ชาย </label>
                          </div>
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input" type="radio" value="หญิง" id="radio-2" name="sex" {{ ($doctor->sex == 'หญิง') ?'checked' :''}} disabled>
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

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Phone Number </label>
                          <input type="text" value="{{$doctor->phone}}" placeholder="Please enter Phone Number" name="phone" required="required" d	data-parsley-length="[9, 13]" id="phone_number" class="form-control" disabled>
                          @error('phone')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>ID Line</label>
                          <input type="text" value="{{$doctor->id_line}}" name="id_line" data-parsley-maxlength="100" class="form-control" placeholder="Please enter ID Line" disabled>
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
                          <label>Email </label>
                          <input type="email" value="{{$doctor->email}}" placeholder="Please enter Email" name="email" data-parsley-trigger="change" data-parsley-maxlength="255" class="form-control" disabled>
                          @error('email')
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
                          <textarea name="address" placeholder="Please enter address" id="" cols="30" rows="4" required="required" class="form-control" disabled>{{($doctor->address)}}</textarea>
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
                              <option value="{{$province->id}}" {{($doctor->province_id == $province->id)?'selected':''}}>{{$province->name_th}}</option>
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
                              <option selected value="{{$doctor->district_id}}">{{$doctor->district_name}}</option>
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
                              <option selected value="{{$doctor->subdistrict_id}}">{{$doctor->subdistrict_name}}</option>
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
                          <input type="text" value="{{$doctor->zip_code}}" placeholder="Please enter zip code" id="zip_code" name="zip_code" required="required" 	data-parsley-length="[0, 10]" class="form-control" disabled>
                          @error('zip_code')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label>Country </label>
                          <input type="text" value="{{$doctor->country}}" placeholder="Please enter country" name="country" required="required" class="form-control" disabled data-parsley-maxlength="40">
                          @error('country')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label> Specialize </label>
                          <input type="text" value="{{$doctor->specialize}}" placeholder="Please enter specialize" name="specialize" class="form-control" disabled data-parsley-maxlength="255">
                          @error('specialize')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label> Position </label>
                          <input type="text" value="{{$doctor->position}}" placeholder="Please enter position" name="position" class="form-control" disabled data-parsley-maxlength="255">
                          @error('position')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label> In Hospital </label>
                          <input type="text" value="{{$doctor->in_hospital}}" placeholder="Please enter in hospital" name="in_hospital" class="form-control" disabled data-parsley-maxlength="255">
                          @error('in_hospital')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-12">
                        <div class="input-style-1">
                          <label>About Me </label>
                          <textarea name="aboutme" placeholder="Please enter aboutme" id="aboutme_editor" cols="30" rows="4" class="form-control" disabled>{{$doctor->aboutme}}</textarea>
                          @error('aboutme')
                          <small class="text-danger">
                            {{ $message }}
                          </small>
                          @enderror
                        </div>
                      </div>
                      <!-- end col -->


                      <div class="col-sm-6 col-md-3">
                        <div class="select-style-1">
                          <label><i class="fa-solid fa-clipboard-check"></i> doctor Status </label>
                          <div class="select-position">
                            <select class="light-bg text-capitalize" name="doctor_status" disabled required="required">
                              <option {{($doctor->doctor_status == '1')?'selected':''}} class="text-capitalize" value="1">Normal</option>
                              <option {{($doctor->doctor_status == '0')?'selected':''}} class="text-capitalize" value="0">Abnormal</option>
                            </select>
                            @error('doctor_status')
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
                        <img src="{{asset('image/uploads/'.$doctor->image)}}" class="rounded-3 me-3" alt="" width="120" height="150" style="object-fit: cover;" id="image-output">
                        <span>
                          <label for="image_update" class="main-btn deactive-btn btn-hover rounded-3 py-2 px-4">
                            <i class="fa-solid fa-folder-open"></i> Upload Image
                            <input type="hidden" name="old_image" value="{{$doctor->image}}">
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
                </div>

                <div class="botton-group mt-4">
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

@endsection
@section('script')
<script src="{{ asset('js/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('js/cleave.js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('js/parsleyjs/dist/parsley.min.js') }}"></script>
<script src="{{ asset('js/ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('js/admin/doctor/doctor_detail.js') }}"></script>
@endsection