@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('js/flatpickr/dist/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/doctor.css') }}">

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
              <h2 class=""><a href=""><small class="text-muted"><i class="fa-solid fa-user-doctor"></i> Doctors /
                  </small></a> Add New
                Doctor</h2>
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
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="{{route('admin.doctor.store')}}" id="form_add_doctor" method="post"
          enctype="multipart/form-data">
          @csrf
          @method('post')
          <div class="row">
            <div class="12">

              <nav class="ms-2">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button class="nav-link active py-3 px-3 px-md-4" id="nav-general-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-general" type="button" role="tab" aria-controls="nav-general"
                    aria-selected="true"><i class="fa-solid fa-user-pen"></i> Doctor General Info</button>
                  <!-- <button class="nav-link py-3 px-3 px-md-4" id="nav-medical-info-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-medical-info" type="button" role="tab" aria-controls="nav-medical-info"
                    aria-selected="false"><i class="fa-solid fa-book-medical"></i> Doctor Medical Info</button>
                  <button class="nav-link py-3 px-3 px-md-4" id="nav-emc-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-emc" type="button" role="tab" aria-controls="nav-emc" aria-selected="false"><i
                      class="fa-solid fa-triangle-exclamation"></i> -</button> -->
                </div>
              </nav>

              <div class="card-style mb-30 border-top-0">
                <div class="tab-content" id="nav-tabContent">

                  <!-- Tab 1 -->
                  <div class="tab-pane fade show active" id="nav-general" role="tabpanel"
                    aria-labelledby="nav-general-tab">
                    <h4 class="mb-25 text-primary"><i class="fa-solid fa-user-pen"></i> Add New Doctors </h4>
                    <div class="row">

                      <div class="col-sm-6 col-md-2">
                        <div class="select-style-1">
                          <label>Title <span class="text-danger">*</span></label>
                          <div class="select-position">
                            <select class="light-bg" required="required" name="title">
                            <option value="นาย" {{ (old('title') == 'นาย') ? "selected" :""}}>นาย</option>
                              <option value="นาง" {{ (old('title') == 'นาง') ? "selected" :""}}>นาง</option>
                              <option value="นางสาว" {{ (old('title') == 'นางสาว') ? "selected" :""}}>นางสาว</option>
                              <option value="ดร." {{ (old('title') == 'ดร.') ? "selected" :""}}>ดร.</option>
                              <option value="นพ." {{ (old('title') == 'นพ.') ? "selected" :""}}>นพ.</option>
                              <option value="พญ." {{ (old('title') == 'พญ.') ? "selected" :""}}>พญ.</option>

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
                          <label>First Name <span class="text-danger">*</span> </label>
                          <input type="text" value="{{old('fname')}}" name="fname" required="required"
                            data-parsley-maxlength="100" class="form-control"
                            placeholder="Please enter First Name">
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
                          <label>Last Name <span class="text-danger">*</span> </label>
                          <input type="text" value="{{old('lname')}}" name="lname" required="required"
                            data-parsley-maxlength="255" class="form-control" placeholder="Please enter Last Name">
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
                          <input type="text" value="{{old('nname')}}" name="nname" data-parsley-maxlength="50"
                            placeholder="Please enter Nick Name">
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
                          <label>Date of Birth <span class="text-danger">*</span> </label>
                          <input type="date" required="required" id="dob" name="birthdate" value="{{old('birthdate')}}" placeholder="Please enter Date of Birth">
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
                          <label>Age <span class="text-danger">*</span> </label>
                          <input type="number" value="{{old('age')}}" placeholder="Age automatically calculate"
                            name="age" required="required" data-parsley-length="[1, 120]" id="age" class="form-control">
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
                            <input class="form-check-input" type="radio" value="ชาย" id="radio-1" name="sex"
                              required="required" {{ (old('sex') == 'ชาย') ? "checked" :""}}>
                            <label class="form-check-label" for="radio-1">
                              <i class="fa-solid fa-mars"></i> ชาย <span class="text-danger">*</span> </label>
                          </div>
                          <div class="form-check radio-style me-4">
                            <input class="form-check-input" type="radio" value="หญิง" id="radio-2" name="sex"
                              {{( old('sex') == 'หญิง') ? "checked" :""}}>
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

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>Phone Number <span class="text-danger">*</span> </label>
                          <input type="text" value="{{old('phone')}}" placeholder="Please enter Phone Number"
                            name="phone" required="required" data-parsley-length="[9, 13]"
                            id="phone_number" class="form-control">
                            @error('phone')
                            <small class="text-danger">
                            {{ $message }}
                            </small>
                            @enderror
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-4">
                        <div class="input-style-1">
                          <label>ID Line</label>
                          <input type="text" value="{{old('id_line')}}" name="id_line" data-parsley-maxlength="100"
                            class="form-control" placeholder="Please enter ID Line">
                            @error('id_line')
                            <small class="text-danger">
                            {{ $message }}
                            </small>
                            @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <!-- end col -->
                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label>Email <span class="text-danger">*</span></label>
                          <input type="email" value="{{old('email')}}" placeholder="Please enter Email"
                            name="email" data-parsley-trigger="change" data-parsley-maxlength="255"
                            class="form-control">
                            @error('email')
                            <small class="text-danger">
                            {{ $message }}
                            </small>
                            @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-sm-6">
                        <div class="input-style-1">
                          <label>Password <span class="text-danger">*</span> </label>
                          <input type="password" value="{{old('password')}}" name="password" data-parsley-length="[1, 20]"
                            class="form-control" placeholder="Please enter user Password">
                            @error('password')
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
                          <textarea name="address" placeholder="Please enter address" id="" cols="30" rows="4"
                            required="required"
                            class="form-control">{{(old('address')) ? old('address') : "บ้านเลขที่:     หมู่ที่:     ถนน:     ตรอก/ซอย:"}}</textarea>
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
                            <select class="light-bg" required="required" name="province_id" id="province_select"
                              style="width: 100%;">
                              <option disabled selected>Please enter Province</option>
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
                            <select class="light-bg" required="required" name="district_id" id="district_select"
                              style="width: 100%;">
                              <option disabled selected>Please enter District</option>
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
                            <select class="light-bg" required="required" name="subdistrict_id" id="subdistrict_select"
                              style="width: 100%;">
                              <option disabled selected>Please enter Subdistrict</option>
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
                          <input type="text" value="{{old('zip_code')}}" placeholder="Please enter zip code"
                            id="zip_code" name="zip_code" required="required" data-parsley-length="[0, 10]" class="form-control">
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
                          <label>Country <span class="text-danger">*</span> </label>
                          <input type="text" value="{{(old('country'))?old('country'):'ไทย'}}" placeholder="Please enter country" name="country"
                            required="required" class="form-control" data-parsley-maxlength="40">
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
                          <input type="text" value="{{old('specialize')}}" placeholder="Please enter specialize"
                            name="specialize" class="form-control" data-parsley-maxlength="255">
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
                          <input type="text" value="{{old('position')}}" placeholder="Please enter position"
                            name="position" class="form-control" data-parsley-maxlength="255">
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
                          <input type="text" value="{{old('in_hospital')}}" placeholder="Please enter in hospital"
                            name="in_hospital" class="form-control" data-parsley-maxlength="255">
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
                          <textarea name="aboutme" placeholder="Please enter aboutme" id="aboutme_editor" cols="30" rows="4"
                            class="form-control">{{(old('aboutme')) ? old('aboutme') : "-"}}</textarea>
                            @error('aboutme')
                            <small class="text-danger">
                            {{ $message }}
                            </small>
                            @enderror
                        </div>
                      </div>
                      <!-- end col -->

                      <div class="col-12">
                        <p><i class="fa-solid fa-image"></i> Image profile</p>
                        <img
                          src="https://www.kindpng.com/picc/m/252-2524695_dummy-profile-image-jpg-hd-png-download.png"
                          class="rounded-3 me-3" alt="" width="120" height="150" style="object-fit: cover;"
                          id="image-output">
                        <span>
                          <label for="image_update" class="main-btn deactive-btn btn-hover rounded-3 py-2 px-4">
                            <i class="fa-solid fa-folder-open"></i> Upload Image
                            <input type="file" name="image" id="image_update" hidden
                              accept="image/png, image/jpg, image/jpeg, image/gif" onchange="loadFile(event)">
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
                    <!-- end row -->
                  </div>

                </div><!-- end Content Tab -->

                <!-- Submit Btn -->
                <hr class="my-3" style="border: 1px solid #E2E8EC;">
                <div class="row">
                  <div class="col-12 mt-4">
                    <div class="button-group d-flex flex-wrap align-items-end">
                                            <a href="{{ url()->previous() }}" class="main-btn danger-btn p-2 mx-2 mb-3">
                        <i class="fa-solid fa-xmark"></i> Cancel
                      </a>
                      <button  type="reset" class="main-btn light-btn p-2 mx-2 mb-3">
                        <i class="fa-solid fa-arrow-rotate-left"></i> Reset
                      </button>
                      <button type="submit" class="main-btn primary-btn btn-hover mx-2 mb-3">
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
<script src="{{ asset('js/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('js/cleave.js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('js/parsleyjs/dist/parsley.min.js') }}"></script>
<script src="{{ asset('js/ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('js/admin/doctor/doctor_add.js') }}"></script>
@endsection