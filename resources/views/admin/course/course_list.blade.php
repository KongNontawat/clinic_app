@extends('admin.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('js/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/datatables.net/dataTables.dateTime.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">


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
              <h2 class=""><a href=""><i class="fa-solid fa-wand-magic-sparkles"></i> Courses</a></h2>
            </div>
          </div>
          <!-- end col -->
          <div class="col-md-6 text-end">
            <a href="#!" class="main-btn primary-btn btn-hover btn-sm" data-bs-toggle="modal" data-bs-target="#modal_create">
              <i class="fa-solid fa-plus mr-5"></i> Add new Course
            </a>
          </div><!-- end col -->
        </div> <!-- end row -->
      </div><!-- title-wrapper -->

      <!-- ========== tables-wrapper start ========== -->
      <div class="tables-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-style mb-3">
              <form action="" class="mb-4">
                <div class="row gy-3 gx-2">

                  <div class="col-sm-6 col-md-4">
                    <div class="input-style-3 mb-0">
                      <input type="text" placeholder="Search Name" class="bg-transparent" id="search_name">
                      <span class="icon"> <i class="fa-solid fa-magnifying-glass me-1"></i></span>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="form-floating">
                      <select class="form-select" id="search_category" aria-label="Floating label select example">
                        <option selected value="">All</option>
                        @foreach($course_categories AS $course_category)
                        <option value="{{$course_category->course_category_name}}">{{$course_category->course_category_name}}</option>
                        @endforeach
                      </select>
                      <label for="search_category"><i class="fa-solid fa-circle-check me-1"></i> Category</label>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-2">
                    <div class="form-floating">
                      <select class="form-select" id="search_type" aria-label="Floating label select example">
                        <option selected value="">All</option>
                        <option value="active" class="text-success">Active</option>
                        <option value="Inactive" class="text-danger">Inactive</option>
                      </select>
                      <label for="search_type"><i class="fa-solid fa-circle-check me-1"></i> Type</label>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-2">
                    <div class="form-floating">
                      <select class="form-select" id="search_status" aria-label="Floating label select example">
                        <option selected value="">All</option>
                        <option value="active" class="text-success">Active</option>
                        <option value="Inactive" class="text-danger">Inactive</option>
                      </select>
                      <label for="search_status"><i class="fa-solid fa-circle-check me-1"></i> Course Status</label>
                    </div>
                  </div>

                </div>
              </form>

              <!-- Table  -->
              <div class="table-wrapper table-responsive pb-3">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 5%;">
                        <h6>#</h6>
                      </th>
                      <th>
                        <h6>Course Name</h6>
                      </th>
                      <th>
                        <h6>Category</h6>
                      </th>
                      <th>
                        <h6>Doctor Price</h6>
                      </th>
                      <th>
                        <h6>Assistant Price</h6>
                      </th>
                      <th>
                        <h6>Course Price</h6>
                      </th>
                      <th>
                        <h6>Total Price</h6>
                      </th>
                      <th>
                        <h6>Type</h6>
                      </th>
                      <th>
                        <h6>Status</h6>
                      </th>
                      <th>
                        <h6>Action</h6>
                      </th>
                    </tr>
                    <!-- end table row-->
                  </thead>
                  <tbody>
                    @foreach($courses as $course)
                    <tr class="{{($course->course_status == 0)?'table-danger':''}}">
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td class="ps-2 course_name">{{$course->course_name}}</td>
                      <td class="course_category_id">{{$course->course_category_name}}</td>
                      <td class="course_doctor_price">{{number_format($course->course_doctor_price)}}</td>
                      <td class="course_assistant_price">{{number_format($course->course_assistant_price)}}</td>
                      <td class="course_course_price">{{number_format($course->course_course_price)}}</td>
                      <td class="course_total_price">{{number_format($course->course_total_price,2)}}</td>
                      <td class="course_type">{{$course->course_type}}</td>
                      <td class="course_status">
                        @if($course->course_status == 1)
                        <a href="{{route('admin.course.change_status',$course->course_id)}}" class="label-icon success rounded-pill text-capitalize"><i class="fa-solid fa-check"></i> Active</a>
                        @else
                        <a href="{{route('admin.course.change_status',$course->course_id)}}" class="label-icon red rounded-pill text-capitalize"><i class="fa-solid fa-xmark"></i> Inactive</a>
                        @endif
                      </td>
                      <td class="text-center">
                        <div class="dropdown">
                          <a class="text-muted dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                          </a>

                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item btn-edit" href="#!" data-id="{{$course->course_id}}" data-bs-toggle="modal" data-bs-target="#modal_update"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            <li><a class="dropdown-item" href="#!"><i class="fa-solid fa-course-gear"></i> View Logs</a></li>
                            </li>
                            <li><a class="dropdown-item btn-delete" href="#!" data-id="{{$course->course_id}}" data-bs-toggle="modal" data-bs-target="#modal_delete"><i class="fa-solid fa-trash"></i> Delete</a></li>

                          </ul>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                    <!-- ========== header end ========== -->
                  </tbody>
                </table>
                <!-- end table -->
              </div>
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
<!-- Modal Delete-->
<div class="follow-up-modal">
  <div class="modal fade" id="modal_delete" tabindex="-1" aria-labelledby="modal_deleteLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content card-style text-center">
        <form action="{{ route('admin.course.delete') }}" method="post">
          @csrf
          @method('delete')
          <div class="modal-body">
            <div class="image mb-30">
              <i class="fa-solid fa-trash" style="font-size: 72px;"></i>
            </div>
            <div class="content mb-30">
              <h2 class="mb-15">Delete Course</h2>
              <p class="text-sm text-medium">
                Are you sure you want delete Course ?
                <input type="hidden" name="course_id" id="delete_course_id" value="">
              </p>
            </div>
            <div class="action d-flex flex-wrap justify-content-center">
              <a class="main-btn deactive-btn rounded-md square-btn btn-hover m-1 " data-bs-dismiss="modal">
                Cancel
              </a>
              <button class="main-btn danger-btn rounded-md square-btn btn-hover m-1" type="submit" class="btn btn-primary">Yes Deleted!</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal create-->
<div class="follow-up-modal">
  <div class="modal fade" id="modal_create" tabindex="-1" aria-labelledby="modal_createLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content card-style">
        <form action="{{ route('admin.course.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-header px-0 border-0">
            <h3 class="text-bold"><i class="fa-solid fa-wand-magic-sparkles"></i> Create New Course</h3>
            <button class="border-0 bg-transparent h1" data-bs-dismiss="modal">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">

              <div class="col-sm-6 col-md-4">
                <div class="select-style-1">
                  <label>Category <span class="text-danger">*</span> </label>
                  <div class="select-position">
                    <select class="light-bg" required="required" name="course_category_id" id="" style="width: 100%;">
                      @foreach($course_categories AS $course_category)
                      <option value="{{$course_category->course_category_id}}">{{$course_category->course_category_name}}</option>
                      @endforeach
                    </select>
                    @error('course_category_id')
                    <small class="text-danger">
                      {{ $message }}
                    </small>
                    @enderror
                  </div>
                </div>
                <!-- end select -->
              </div>
              <!-- end col -->

              <div class="col-sm-6 col-md-8">
                <div class="input-style-1">
                  <label>Course Name <span class="text-danger">*</span> </label>
                  <input type="text" value="{{old('course_name')}}" name="course_name" required="required" data-parsley-maxlength="255" class="form-control">
                  @error('course_name')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="input-style-1">
                  <label>Doctor Price </label>
                  <input type="number" value="{{(old('course_doctor_price'))?old('course_doctor_price'):0}}" name="course_doctor_price" data-parsley-minlength="0" class="form-control on_course_doctor_price">
                  @error('course_doctor_price')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="input-style-1">
                  <label>Assistant Price </label>
                  <input type="number" value="{{(old('course_assistant_price'))?old('course_assistant_price'):0}}" name="course_assistant_price" data-parsley-minlength="0" class="form-control on_course_assistant_price">
                  @error('course_assistant_price')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="input-style-1">
                  <label>Course Price <span class="text-danger">*</span> </label>
                  <input type="number" value="{{old('course_course_price')}}" name="course_course_price" required="required" data-parsley-minlength="0" class="form-control on_course_course_price">
                  @error('course_course_price')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="input-style-1">
                  <label>Total Price <span class="text-danger">*</span> </label>
                  <input type="number" value="{{old('course_total_price')}}" readonly name="course_total_price" required="required" data-parsley-minlength="0" class="form-control on_course_total_price">
                  @error('course_total_price')
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
                    <input class="form-check-input" type="radio" value="ชาย" id="radio-1" name="course_type" required="required" {{ (old('course_type') == 'ชาย') ? "checked" :""}}>
                    <label class="form-check-label" for="radio-1">
                      <i class="fa-solid fa-mars"></i> ชาย <span class="text-danger">*</span> </label>
                  </div>
                  <div class="form-check radio-style me-4">
                    <input class="form-check-input" type="radio" value="หญิง" id="radio-2" name="course_type" {{( old('course_type') == 'หญิง') ? "checked" :""}}>
                    <label class="form-check-label" for="radio-2">
                      <i class="fa-solid fa-venus"></i> หญิง <span class="text-danger">*</span> </label>
                  </div>
                  @error('course_type')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6 col-md-3">
                <div class="input-style-1">
                  <label>Number of Time <span class="text-danger">*</span> </label>
                  <input type="number" value="{{old('course_number_of_time')}}" name="course_number_of_time" required="required" data-parsley-minlength="0" class="form-control" placeholder="Please enter Number of Time">
                  @error('course_number_of_time')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-12">
                <div class="input-style-1">
                  <label> Course Details</label>
                  <textarea rows="4" cols="30" id="course_detail" name="course_detail" class="form-control" placeholder="Please enter Course Details">{{old('course_detail')}}</textarea>
                  @error('course_detail')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

            </div>
            <div class="action mt-4">
              <div class="button-group d-flex flex-wrap align-items-end justify-content-between">
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

<!-- Modal update-->
<div class="follow-up-modal">
  <div class="modal fade" id="modal_update" tabindex="-1" aria-labelledby="modal_updateLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content card-style">
        <form action="{{ route('admin.course.update') }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <input type="hidden" name="course_id" id="course_id" value="">
          <div class="modal-header px-0 border-0">
            <h3 class="text-bold"><i class="fa-solid fa-wand-magic-sparkles"></i> Update/Edit Course</h3>
            <button class="border-0 bg-transparent h1" data-bs-dismiss="modal">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">

              <div class="col-sm-6 col-md-4">
                <div class="select-style-1">
                  <label>Category <span class="text-danger">*</span> </label>
                  <div class="select-position">
                    <select class="light-bg e_course_category_id" required="required" name="course_category_id" id="" style="width: 100%;">
                      @foreach($course_categories AS $course_category)
                      <option value="{{$course_category->course_category_id}}">{{$course_category->course_category_name}}</option>
                      @endforeach
                    </select>
                    @error('course_category_id')
                    <small class="text-danger">
                      {{ $message }}
                    </small>
                    @enderror
                  </div>
                </div>
                <!-- end select -->
              </div>
              <!-- end col -->

              <div class="col-sm-6 col-md-8">
                <div class="input-style-1">
                  <label>Course Name <span class="text-danger">*</span> </label>
                  <input type="text" value="" name="course_name" required="required" data-parsley-maxlength="255" class="form-control e_course_name">
                  @error('course_name')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="input-style-1">
                  <label>Doctor Price </label>
                  <input type="number" value="" name="course_doctor_price" data-parsley-minlength="0" class="form-control e_course_doctor_price">
                  @error('course_doctor_price')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="input-style-1">
                  <label>Assistant Price </label>
                  <input type="number" value="" name="course_assistant_price" data-parsley-minlength="0" class="form-control e_course_assistant_price">
                  @error('course_assistant_price')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="input-style-1">
                  <label>Course Price <span class="text-danger">*</span> </label>
                  <input type="number" value="" name="course_course_price" required="required" data-parsley-minlength="0" class="form-control e_course_course_price">
                  @error('course_course_price')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="input-style-1">
                  <label>Total Price <span class="text-danger">*</span> </label>
                  <input type="number" value="" readonly name="course_total_price" required="required" data-parsley-minlength="0" class="form-control e_course_total_price">
                  @error('course_total_price')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6 col-md-3 d-flex align-items-center">
                <div class="input-style-1 d-flex mt-2">
                  <div class="form-check radio-style me-4 e_course_type">
                    <input class="form-check-input" type="radio" value="ชาย" id="radio-1" name="course_type" required="required" {{ (old('course_type') == 'ชาย') ? "checked" :""}}>
                    <label class="form-check-label" for="radio-1">
                      <i class="fa-solid fa-mars"></i> ชาย <span class="text-danger">*</span> </label>
                  </div>
                  <div class="form-check radio-style me-4">
                    <input class="form-check-input" type="radio" value="หญิง" id="radio-2" name="course_type" {{( old('course_type') == 'หญิง') ? "checked" :""}}>
                    <label class="form-check-label" for="radio-2">
                      <i class="fa-solid fa-venus"></i> หญิง <span class="text-danger">*</span> </label>
                  </div>
                  @error('course_type')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6 col-md-3">
                <div class="input-style-1">
                  <label>Number of Time <span class="text-danger">*</span> </label>
                  <input type="number" value="" name="course_number_of_time" required="required" data-parsley-minlength="0" class="form-control e_course_number_of_time" placeholder="Please enter Number of Time">
                  @error('course_number_of_time')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-12">
                <div class="input-style-1">
                  <label> Course Details</label>
                  <textarea rows="4" cols="30" id="e_course_detail" name="course_detail" class="form-control" placeholder="Please enter Course Details"></textarea>
                  @error('course_detail')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6 col-md-3">
                <div class="select-style-1">
                  <label><i class="fa-solid fa-clipboard-check"></i> Status </label>
                  <div class="select-position">
                    <select class="light-bg text-capitalize" name="course_status" id="e_course_status" required="required">
                      <option class="text-capitalize" value="1">Active</option>
                      <option class="text-capitalize" value="0">Inactive</option>
                    </select>
                    @error('course_status')
                    <small class="text-danger">
                      {{ $message }}
                    </small>
                    @enderror
                  </div>
                </div>
              </div>
              <!-- end col -->

            </div>
            <div class="action mt-4">
              <div class="button-group d-flex flex-wrap align-items-end justify-content-between">
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

@endsection
@section('script')
<script src="{{ asset('js/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('js/ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('js/parsleyjs/dist/parsley.min.js') }}"></script>
<script src="{{ asset('js/admin/course/course.js') }}"></script>
@endsection