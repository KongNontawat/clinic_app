<?php

use App\Models\Medicine;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\AppointmentController;

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});

Route::controller(HomeController::class)->group(function () {
    
});


Route::get('admin', function() {
    return view('admin.home');
})->name('admin');

Route::get('admin/home', function () {
    return view('admin.home');
})->name('admin.home');

Route::get('admin/bill', function () {
    $medicine_categories = DB::table('medicine_category')->get();
    $medicines = Medicine::leftJoin('medicine_category', 'medicine_category.medicine_category_id', '=', 'medicines.medicine_category_id')
    ->leftJoin('doctors', 'doctors.doctor_id', '=', 'medicines.medicine_licensed_doctor_id')
    ->get();
    return view('admin.bill.bill', compact(['medicines', 'medicine_categories']));
})->name('admin.bill');

Route::controller(PatientController::class)->group(function () {
    Route::get('admin/patient','index')->name('admin.patient');
    Route::get('admin/patient/detail/{id}','view_detail')->name('admin.patient.detail');
    Route::get('admin/patient/add','create')->name('admin.patient.add');
    Route::post('admin/patient/store','store')->name('admin.patient.store');
    Route::get('admin/patient/edit/{id}','edit')->name('admin.patient.edit');
    Route::put('admin/patient/update','update')->name('admin.patient.update');
    Route::delete('admin/patient/delete','delete')->name('admin.patient.delete');
    Route::get('admin/patient/change_status/{id}','change_status')->name('admin.patient.change_status');

});

Route::controller(DoctorController::class)->group(function () {
    Route::get('admin/doctor','index')->name('admin.doctor');
    Route::get('admin/doctor/detail/{id}','view_detail')->name('admin.doctor.detail');
    Route::get('admin/doctor/add','create')->name('admin.doctor.add');
    Route::post('admin/doctor/store','store')->name('admin.doctor.store');
    Route::get('admin/doctor/edit/{id}','edit')->name('admin.doctor.edit');
    Route::put('admin/doctor/update','update')->name('admin.doctor.update');
    Route::delete('admin/doctor/delete','delete')->name('admin.doctor.delete');
    Route::get('admin/doctor/change_status/{id}','change_status')->name('admin.doctor.change_status');

});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('admin/employee','index')->name('admin.employee');
    Route::get('admin/employee/detail/{id}','view_detail')->name('admin.employee.detail');
    Route::get('admin/employee/add','create')->name('admin.employee.add');
    Route::post('admin/employee/store','store')->name('admin.employee.store');
    Route::get('admin/employee/edit/{id}','edit')->name('admin.employee.edit');
    Route::put('admin/employee/update','update')->name('admin.employee.update');
    Route::delete('admin/employee/delete','delete')->name('admin.employee.delete');
    Route::get('admin/employee/change_status/{id}','change_status')->name('admin.employee.change_status');

});

Route::controller(UserController::class)->group(function () {
    Route::get('admin/user','index')->name('admin.user');
    Route::post('admin/user/store','store')->name('admin.user.store');
    Route::put('admin/user/update','update')->name('admin.user.update');
    Route::delete('admin/user/delete','delete')->name('admin.user.delete');
    Route::get('admin/user/change_status/{id}','change_status')->name('admin.user.change_status');


    Route::get('admin/user/logs','view_logs')->name('admin.user.logs');
});

Route::controller(AppointmentController::class)->group(function () {
    Route::get('admin/appointment','appointment')->name('admin.appointment');
    Route::post('admin/appointment/store','store')->name('admin.appointment.store');
    Route::put('admin/appointment/update','update')->name('admin.appointment.update');
    Route::put('admin/appointment/cancel','cancel')->name('admin.appointment.cancel');
    Route::get('admin/appointment/change_status/{id}','change_status')->name('admin.appointment.change_status');
    Route::get('admin/appointment/get_doctor_schedule','get_doctor_schedule')->name('admin.appointment.get_doctor_schedule');
    Route::get('admin/appointment/show','show')->name('admin.appointment.show');
    Route::get('admin/appointment/print/{id}',function($id) {
        return view('admin.appointment.appointment_print');
    })->name('admin.appointment.print');

    Route::get('admin/schedule','calendar')->name('admin.schedule');
    Route::get('admin/schedule/get_schedule','get_schedule')->name('admin.schedule.get_schedule');
});

Route::controller(CourseController::class)->group(function () {
    Route::get('admin/course','index')->name('admin.course');
    Route::post('admin/course/store','store')->name('admin.course.store');
    Route::get('admin/course/edit','edit')->name('admin.course.edit');
    Route::put('admin/course/update','update')->name('admin.course.update');
    Route::delete('admin/course/delete','delete')->name('admin.course.delete');
    Route::get('admin/course/change_status/{id}','change_status')->name('admin.course.change_status');
});

Route::controller(MedicineController::class)->group(function () {
    Route::get('admin/medicine','index')->name('admin.medicine');
    Route::post('admin/medicine/store','store')->name('admin.medicine.store');
    Route::get('admin/medicine/edit','edit')->name('admin.medicine.edit');
    Route::put('admin/medicine/update','update')->name('admin.medicine.update');
    Route::delete('admin/medicine/delete','delete')->name('admin.medicine.delete');
    Route::get('admin/medicine/change_status/{id}','change_status')->name('admin.medicine.change_status');
});

Route::get('/', function() {
    return view('home');
})->name('/');
Route::get('/home', function() {
    return view('home');
})->name('home');
Route::get('/detail', function() {
    return view('detail');
})->name('detail');

Route::get('admin/dashboard', function () {
    return view('admin.dashboard.index');
})->name('admin.dashboard');

Route::get('/promotion', function() {
    return view('promotion');
})->name('promotion');

Route::get('/blog', function() {
    return view('blog');
})->name('blog');

Route::get('/review', function() {
    return view('review');
})->name('review');

Route::get('get_district/{id}', function($id) {
    $districts = DB::table('amphures')->where('province_id', $id)->get(['id','name_th']);
    return response()->json($districts);
});
Route::get('get_subdistrict/{id}', function($id) {
    $subdistricts = DB::table('districts')->where('amphure_id', $id)->get(['id','zip_code','name_th']);
    return response()->json($subdistricts);
});


Auth::routes();

