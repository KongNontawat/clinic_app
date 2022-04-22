@extends('admin.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('js/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/flatpickr/dist/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/datatables.net/dataTables.dateTime.min.css') }}">

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
              <h2 class=""><a href=""><i class="fa-solid fa-circle-user"></i> Users</a></h2>
            </div>
          </div>
          <!-- end col -->
          <div class="col-md-6 text-end">
            <a href="#!" class="main-btn primary-btn btn-hover btn-sm" data-bs-toggle="modal" data-bs-target="#modal_create">
              <i class="fa-solid fa-plus mr-5"></i> Add new User
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

                  <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="input-style-3 mb-0">
                      <input type="text" placeholder="Search Role" class="bg-transparent" id="search_role">
                      <span class="icon"> <i class="fa-solid fa-user-shield me-1"></i></span>
                    </div>
                  </div>

                  
                  <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="form-floating">
                      <select class="form-select" id="search_status" aria-label="Floating label select example">
                        <option selected value="">All</option>
                        <option value="active" class="text-success">Active</option>
                        <option value="Inactive" class="text-danger">Inactive</option>
                      </select>
                      <label for="search_status"><i class="fa-solid fa-toggle-off me-1"></i> User Status</label>
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
                        <h6>ID.</h6>
                      </th>
                      <th style="width: 10%;">
                        <h6></h6>
                      </th>
                      <th>
                        <h6>Name</h6>
                      </th>
                      <th>
                        <h6>Email</h6>
                      </th>
                      <th>
                        <h6>Role</h6>
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
                    @foreach($users as $user)
                    <tr class="{{($user->user_status == 0)?'table-danger':''}}">
                      <td class="text-center"><a href="" class="text-primary user_id">{{$user->user_id}}</a></td>
                      <td class="text-center"><img src="{{url('image/uploads/',$user->user_image)}}" class="rounded-circle user_image" alt="{{$user->user_image}}" style="width:60px;height:60px;object-fit:cover;"></td>
                      <td class="ps-2 user_name">{{$user->name}}</td>
                      <td class="user_email">{{$user->email}}</td>
                      <td class="user_role">{{$user->role}}</td>
                      <td class="user_status">
                        @if($user->user_status == 1)
                        <a href="{{route('admin.user.change_status',$user->user_id)}}" class="label-icon success rounded-pill text-capitalize"><i class="fa-solid fa-check"></i> Active</a>
                        @else
                        <a href="{{route('admin.user.change_status',$user->user_id)}}" class="label-icon red rounded-pill text-capitalize"><i class="fa-solid fa-xmark"></i> Inactive</a>
                        @endif
                      </td>
                      <td class="text-center">
                        <div class="dropdown dropstart">
                          <a class="text-muted dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                          </a>

                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item btn-edit" href="#!" data-id="{{$user->user_id}}" data-bs-toggle="modal" data-bs-target="#modal_update"><i class="fa-solid fa-pen-to-square"></i> Edit</a></li>
                            <li><a class="dropdown-item btn-delete" href="#!" data-id="{{$user->user_id}}" data-bs-toggle="modal" data-bs-target="#modal_delete"><i class="fa-solid fa-trash"></i> Delete</a></li>

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
        <form action="{{ route('admin.user.delete') }}" method="post">
          @csrf
          @method('delete')
          <div class="modal-body">
            <div class="image mb-30">
              <i class="fa-solid fa-trash" style="font-size: 72px;"></i>
            </div>
            <div class="content mb-30">
              <h2 class="mb-15">Delete Account</h2>
              <p class="text-sm text-medium">
                Are you sure you want delete Account ?
                <input type="hidden" name="user_id" id="delete_user_id" value="">
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
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content card-style">
        <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-header px-0 border-0">
            <h3 class="text-bold"><i class="fa-solid fa-user-plus"></i> Create New User</h3>
            <button class="border-0 bg-transparent h1" data-bs-dismiss="modal">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">

              <div class="col-sm-6">
                <div class="input-style-1">
                  <label> Name <span class="text-danger">*</span> </label>
                  <input type="text" value="{{old('name')}}" name="name" required="required" data-parsley-maxlength="255" class="form-control" placeholder="Please enter your First Name" autocomplete="off">
                  @error('name')
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
                  <input type="email" value="" placeholder="Please enter your Email" name="email" data-parsley-trigger="change" data-parsley-maxlength="255" class="form-control" autocomplete="off">
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
                  <input type="password" value="" name="password" data-parsley-length="[1, 20]" class="form-control" placeholder="Please enter user Password" autocomplete="off">
                  @error('password')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6">
                <div class="select-style-1">
                  <label>Employee Role <span class="text-danger">*</span> </label>
                  <div class="select-position">
                    <select class="light-bg" required="required" name="role" id="role_select" style="width: 100%;">
                      <option value="admin">admin/employee</option>
                      <option value="doctor">doctor</option>
                      <option value="manager">manager</option>
                      <option value="user">user</option>
                    </select>
                    @error('role')
                    <small class="text-danger">
                      {{ $message }}
                    </small>
                    @enderror
                  </div>
                </div>
                <!-- end select -->
              </div>
              <!-- end col -->

              <div class="col-12">
                <p><i class="fa-solid fa-image"></i> Image profile</p>
                <img src="https://www.kindpng.com/picc/m/252-2524695_dummy-profile-image-jpg-hd-png-download.png" class="rounded-3 me-3" alt="" width="120" height="150" style="object-fit: cover;" id="image-output">
                <span>
                  <label for="user_image" class="main-btn deactive-btn btn-hover rounded-3 py-2 px-4">
                    <i class="fa-solid fa-folder-open"></i> Upload Image
                    <input type="file" name="user_image" id="user_image" hidden accept="image/png, image/jpg, image/jpeg, image/gif" onchange="loadFile(event)">
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
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content card-style">
        <form action="{{ route('admin.user.update') }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="modal-header px-0 border-0">
            <h3 class="text-bold"><i class="fa-solid fa-user-pen"></i> Update/Edit User</h3>
            <button class="border-0 bg-transparent h1" data-bs-dismiss="modal">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">

              <div class="col-sm-6">
                <div class="input-style-1">
                  <label> Name <span class="text-danger">*</span> </label>
                  <input type="hidden" name="user_id" value="" id="e_user_id">
                  <input type="text" value="" id="e_user_name" name="name" required="required" data-parsley-maxlength="255" class="form-control" placeholder="Please enter your First Name">
                  @error('name')
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
                  <input type="email" value="{{old('email')}}" id="e_user_email" placeholder="Please enter your Email" name="email" data-parsley-trigger="change" data-parsley-maxlength="255" class="form-control">
                  @error('email')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6">
                <div class="select-style-1">
                  <label>User Role <span class="text-danger">*</span> </label>
                  <div class="select-position">
                    <select class="light-bg" required="required" name="role" id="e_user_role" style="width: 100%;">
                      <option value="admin">admin/employee</option>
                      <option value="doctor">doctor</option>
                      <option value="manager">manager</option>
                      <option value="user">user</option>
                    </select>
                    @error('role')
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
                          <label><i class="fa-solid fa-clipboard-check"></i> User Status </label>
                          <div class="select-position">
                            <select class="light-bg text-capitalize" name="user_status" id="e_user_status" required="required">
                              <option class="text-capitalize" value="0">Active</option>
                              <option class="text-capitalize" value="0">Inactive</option>
                            </select>
                            @error('user_status')
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
                <img src="" class="rounded-3 me-3 image-output" alt="" width="120" height="150" style="object-fit: cover;" id="">
                <span>
                  <label for="image_update" class="main-btn deactive-btn btn-hover rounded-3 py-2 px-4">
                    <i class="fa-solid fa-folder-open"></i> Upload Image
                    <input type="hidden" name="old_image" value="" id="e_old_image">
                    <input type="file" name="user_image" id="image_update" hidden accept="image/png, image/jpg, image/jpeg, image/gif" onchange="loadFile2(event)">
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
<script src="{{ asset('js/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('js/cleave.js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('js/admin/user/user.js') }}"></script>
@endsection