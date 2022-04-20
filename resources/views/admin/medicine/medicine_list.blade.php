@extends('admin.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('js/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
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
              <h2 class=""><a href=""><i class="fa-solid fa-syringe"></i> Medicines / Equipment</a></h2>
            </div>
          </div>
          <!-- end col -->
          <div class="col-md-6 text-end">
            <a href="#!" class="main-btn primary-btn btn-hover btn-sm" data-bs-toggle="modal" data-bs-target="#modal_create">
              <i class="fa-solid fa-plus mr-5"></i> Add new Medicine
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
                        @foreach($medicine_categories AS $medicine_category)
                        <option value="{{$medicine_category->medicine_category_name}}">{{$medicine_category->medicine_category_name}}</option>
                        @endforeach
                      </select>
                      <label for="search_category"><i class="fa-solid fa-circle-check me-1"></i> Category</label>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-2">
                    <div class="form-floating">
                      <select class="form-select" id="search_type" aria-label="Floating label select example">
                        <option selected value="">All</option>
                        <option value="medicine" class="">Medicine</option>
                        <option value="equipment" class="">Equipment</option>
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
                      <label for="search_status"><i class="fa-solid fa-circle-check me-1"></i> Medicine Status</label>
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
                      <th class="text-center" style="width: 5%;">
                        <h6></h6>
                      </th>
                      <th>
                        <h6>Medicine Name</h6>
                      </th>
                      <th>
                        <h6>Category</h6>
                      </th>
                      <th>
                        <h6>Price</h6>
                      </th>
                      <th>
                        <h6>Stock</h6>
                      </th>
                      <th>
                        <h6>Doctor</h6>
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
                    @foreach($medicines as $medicine)
                    <tr class="{{($medicine->medicine_status == 0)?'table-danger':''}}">
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td class="ps-2">
                        <p class="text-white rounded-pill badge py-0 px-2 {{($medicine->medicine_type == 'medicine')?'bg-primary':'bg-warning'}}">{{$medicine->medicine_type}}</p>
                      </td>
                      <td class="ps-2">{{$medicine->medicine_name}}</td>
                      <td class="">{{$medicine->medicine_category_name}}</td>
                      <td class="">{{number_format($medicine->medicine_price)}}</td>
                      <td class="">{{number_format($medicine->medicine_stock)}} {{$medicine->medicine_unit}}</td>
                      <td class="">{{$medicine->title}} {{$medicine->fname}} {{$medicine->lname}}</td>
                      <td class="">
                        @if($medicine->medicine_status == 1)
                        <a href="{{route('admin.medicine.change_status',$medicine->medicine_id)}}" class="label-icon success rounded-pill text-capitalize"><i class="fa-solid fa-check"></i> Active</a>
                        @else
                        <a href="{{route('admin.medicine.change_status',$medicine->medicine_id)}}" class="label-icon red rounded-pill text-capitalize"><i class="fa-solid fa-xmark"></i> Inactive</a>
                        @endif
                      </td>
                      <td class="text-center">
                        <div class="dropdown">
                          <a class="text-muted dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                          </a>

                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item btn-edit" href="#!" data-id="{{$medicine->medicine_id}}" data-bs-toggle="modal" data-bs-target="#modal_update"><i class="fa-solid fa-pen-to-square"></i> Edit</a></li>
                            <li><a class="dropdown-item btn-delete" href="#!" data-id="{{$medicine->medicine_id}}" data-bs-toggle="modal" data-bs-target="#modal_delete"><i class="fa-solid fa-trash"></i> Delete</a></li>

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
        <form action="{{ route('admin.medicine.delete') }}" method="post">
          @csrf
          @method('delete')
          <div class="modal-body">
            <div class="image mb-30">
              <i class="fa-solid fa-trash" style="font-size: 72px;"></i>
            </div>
            <div class="content mb-30">
              <h2 class="mb-15">Delete Medicine</h2>
              <p class="text-sm text-medium">
                Are you sure you want delete Medicine ?
                <input type="hidden" name="medicine_id" id="delete_medicine_id" value="">
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
        <form action="{{ route('admin.medicine.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-header px-0 border-0">
            <h3 class="text-bold"><i class="fa-solid fa-syringe"></i> Create New Medicine / Equipment</h3>
            <div class="right d-flex align-items-center">
              <div class="input-style-1 d-flex align-items-center m-0">
                <div class="form-check radio-style me-4">
                  <input class="form-check-input" type="radio" value="medicine" id="radio-1" name="medicine_type" required="required" {{ (old('medicine_type') == 'medicine' || old('medicine_type') == null) ? "checked" :""}}>
                  <label class="form-check-label" for="radio-1">
                    <i class="fa-solid fa-capsules"></i> Medicine </label>
                </div>
                <div class="form-check radio-style me-4">
                  <input class="form-check-input" type="radio" value="equipment" id="radio-2" name="medicine_type" {{( old('medicine_type') == 'equipment') ? "checked" :""}}>
                  <label class="form-check-label" for="radio-2">
                    <i class="fa-solid fa-syringe"></i> Equipment </label>
                </div>
                @error('medicine_type')
                <small class="text-danger">
                  {{ $message }}
                </small>
                @enderror
              </div>

              <button class="border-0 bg-transparent h1" data-bs-dismiss="modal">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
          </div>
          <div class="modal-body">
            <div class="row">

              <div class="col-sm-6 col-md-4">
                <div class="select-style-1">
                  <label>Category <span class="text-danger">*</span> </label>
                  <div class="select-position">
                    <select class="light-bg" required="required" name="medicine_category_id" id="" style="width: 100%;">
                      @foreach($medicine_categories AS $medicine_category)
                      <option value="{{$medicine_category->medicine_category_id}}">{{$medicine_category->medicine_category_name}}</option>
                      @endforeach
                    </select>
                    @error('medicine_category_id')
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
                  <label>Medicine Name <span class="text-danger">*</span> </label>
                  <input type="text" value="{{old('medicine_name')}}" name="medicine_name" required="required" data-parsley-maxlength="255" class="form-control">
                  @error('medicine_name')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6 col-md-4">
                <div class="input-style-1">
                  <label> Price </label>
                  <input type="number" value="{{(old('medicine_price'))?old('medicine_price'):0}}" name="medicine_price" data-parsley-minlength="0" class="form-control on_medicine_price">
                  @error('medicine_price')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6 col-md-4">
                <div class="input-style-1">
                  <label> Stock </label>
                  <input type="number" value="{{(old('medicine_stock'))?old('medicine_stock'):1}}" name="medicine_stock" data-parsley-minlength="0" class="form-control on_medicine_stock">
                  @error('medicine_stock')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6 col-md-4">
                <div class="input-style-1">
                  <label> Unit </label>
                  <input type="text" value="{{old('medicine_unit')}}" name="medicine_unit" data-parsley-maxlength="20" class="form-control on_medicine_unit">
                  @error('medicine_unit')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>

              <div class="col-lg-6">
                <div class="input-style-1">
                  <label> How To Use</label>
                  <textarea rows="4" cols="30" id="medicine_how_to_use" name="medicine_how_to_use" class="form-control" placeholder="Please enter medicine Details">{{old('medicine_how_to_use')}}</textarea>
                  @error('medicine_how_to_use')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-lg-6">
                <div class="input-style-1">
                  <label> Details</label>
                  <textarea rows="4" cols="30" id="medicine_detail" name="medicine_detail" class="form-control" placeholder="Please enter medicine Details">{{old('medicine_detail')}}</textarea>
                  @error('medicine_detail')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6">
                <div class="select-style-1">
                  <label>Licensed Doctor<span class="text-danger">*</span> </label>
                  <div class="select-position">
                    <select class="light-bg" required="required" name="medicine_licensed_doctor_id" id="" style="width: 100%;">
                      @foreach($doctors AS $doctor)
                      <option value="{{$doctor->doctor_id}}">{{$doctor->title}} {{$doctor->fname}} {{$doctor->lname}}</option>
                      @endforeach
                    </select>
                    @error('medicine_licensed_doctor_id')
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
        <form action="{{ route('admin.medicine.update') }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <input type="hidden" name="medicine_id" id="medicine_id" value="">
          <div class="modal-header px-0 border-0">
            <h3 class="text-bold"><i class="fa-solid fa-syringe"></i> Update/Edit Medicine / Equipment</h3>
            <div class="right d-flex align-items-center">
              <div class="input-style-1 d-flex align-items-center m-0">
                <div class="form-check radio-style me-4">
                  <input class="form-check-input e_medicine_type" type="radio" value="medicine" id="radio-1" name="medicine_type" required="required">
                  <label class="form-check-label" for="radio-1">
                    <i class="fa-solid fa-capsules"></i> Medicine </label>
                </div>
                <div class="form-check radio-style me-4">
                  <input class="form-check-input e_medicine_type" type="radio" value="equipment" id="radio-2" name="medicine_type">
                  <label class="form-check-label" for="radio-2">
                    <i class="fa-solid fa-syringe"></i> Equipment </label>
                </div>
                @error('medicine_type')
                <small class="text-danger">
                  {{ $message }}
                </small>
                @enderror
              </div>

              <button class="border-0 bg-transparent h1" data-bs-dismiss="modal">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
          </div>
          <div class="modal-body">
            <div class="row">

              <div class="col-sm-6 col-md-4">
                <div class="select-style-1">
                  <label>Category <span class="text-danger">*</span> </label>
                  <div class="select-position">
                    <select class="light-bg e_medicine_category_id" required="required" name="medicine_category_id" id="" style="width: 100%;">
                      @foreach($medicine_categories AS $medicine_category)
                      <option value="{{$medicine_category->medicine_category_id}}">{{$medicine_category->medicine_category_name}}</option>
                      @endforeach
                    </select>
                    @error('medicine_category_id')
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
                  <label>Medicine Name <span class="text-danger">*</span> </label>
                  <input type="text" value="{{old('medicine_name')}}" name="medicine_name" required="required" data-parsley-maxlength="255" class="form-control e_medicine_name">
                  @error('medicine_name')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6 col-md-4">
                <div class="input-style-1">
                  <label> Price </label>
                  <input type="number" value="{{(old('medicine_price'))?old('medicine_price'):0}}" name="medicine_price" data-parsley-minlength="0" class="form-control e_medicine_price">
                  @error('medicine_price')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6 col-md-4">
                <div class="input-style-1">
                  <label> Stock </label>
                  <input type="number" value="{{(old('medicine_stock'))?old('medicine_stock'):1}}" name="medicine_stock" data-parsley-minlength="0" class="form-control e_medicine_stock">
                  @error('medicine_stock')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6 col-md-4">
                <div class="input-style-1">
                  <label> Unit </label>
                  <input type="text" value="{{old('medicine_unit')}}" name="medicine_unit" data-parsley-maxlength="20" class="form-control e_medicine_unit">
                  @error('medicine_unit')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>

              <div class="col-lg-6">
                <div class="input-style-1">
                  <label> How To Use</label>
                  <textarea rows="4" cols="30" id="e_medicine_how_to_use" name="medicine_how_to_use" class="form-control" placeholder="Please enter medicine Details">{{old('medicine_how_to_use')}}</textarea>
                  @error('medicine_how_to_use')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-lg-6">
                <div class="input-style-1">
                  <label> Details</label>
                  <textarea rows="4" cols="30" id="e_medicine_detail" name="medicine_detail" class="form-control" placeholder="Please enter medicine Details">{{old('medicine_detail')}}</textarea>
                  @error('medicine_detail')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
              </div>
              <!-- end col -->

              <div class="col-sm-6">
                <div class="select-style-1">
                  <label>Licensed Doctor<span class="text-danger">*</span> </label>
                  <div class="select-position">
                    <select class="light-bg" required="required" name="medicine_licensed_doctor_id" id="e_medicine_licensed_doctor_id" style="width: 100%;">
                      @foreach($doctors AS $doctor)
                      <option value="{{$doctor->doctor_id}}">{{$doctor->title}} {{$doctor->fname}} {{$doctor->lname}}</option>
                      @endforeach
                    </select>
                    @error('medicine_licensed_doctor_id')
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
                  <label><i class="fa-solid fa-clipboard-check"></i> Status </label>
                  <div class="select-position">
                    <select class="light-bg text-capitalize" name="medicine_status" id="e_medicine_status" required="required">
                      <option class="text-capitalize" value="1">Active</option>
                      <option class="text-capitalize" value="0">Inactive</option>
                    </select>
                    @error('medicine_status')
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
<script src="{{ asset('js/admin/medicine/medicine.js') }}"></script>
@endsection