<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\EmployeeController;

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

Route::controller(PatientController::class)->group(function () {
    Route::get('admin/patient','index')->name('admin.patient');
    Route::get('admin/patient/detail/{id}','view_detail')->name('admin.patient.detail');
    Route::get('admin/patient/add','create')->name('admin.patient.add');
    Route::post('admin/patient/store','store')->name('admin.patient.store');
    Route::get('admin/patient/edit/{id}','edit')->name('admin.patient.edit');
    Route::put('admin/patient/update','update')->name('admin.patient.update');
    Route::delete('admin/patient/delete','delete')->name('admin.patient.delete');
});

Route::controller(DoctorController::class)->group(function () {
    Route::get('admin/doctor','index')->name('admin.doctor');
    Route::get('admin/doctor/detail/{id}','view_detail')->name('admin.doctor.detail');
    Route::get('admin/doctor/add','create')->name('admin.doctor.add');
    Route::post('admin/doctor/store','store')->name('admin.doctor.store');
    Route::get('admin/doctor/edit/{id}','edit')->name('admin.doctor.edit');
    Route::put('admin/doctor/update','update')->name('admin.doctor.update');
    Route::delete('admin/doctor/delete','delete')->name('admin.doctor.delete');
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('admin/employee','index')->name('admin.employee');
    Route::get('admin/employee/detail/{id}','view_detail')->name('admin.employee.detail');
    Route::get('admin/employee/add','create')->name('admin.employee.add');
    Route::post('admin/employee/store','store')->name('admin.employee.store');
    Route::get('admin/employee/edit/{id}','edit')->name('admin.employee.edit');
    Route::put('admin/employee/update','update')->name('admin.employee.update');
    Route::delete('admin/employee/delete','delete')->name('admin.employee.delete');
});

Route::controller(UserController::class)->group(function () {
    Route::get('admin/user','index')->name('admin.user');
    Route::post('admin/user/store','store')->name('admin.user.store');
    Route::put('admin/user/update','update')->name('admin.user.update');
    Route::delete('admin/user/delete','delete')->name('admin.user.delete');

    Route::get('admin/user/logs','view_logs')->name('admin.user.logs');
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

Route::get('/Promotion', function() {
    return view('Promotion');
})->name('Promotion');

Route::get('/Blog', function() {
    return view('Blog');
})->name('Blog');

Route::get('/Review', function() {
    return view('Review');
})->name('Review');

Route::get('get_district/{id}', function($id) {
    $districts = DB::table('amphures')->where('province_id', $id)->get(['id','name_th']);
    return response()->json($districts);
});
Route::get('get_subdistrict/{id}', function($id) {
    $subdistricts = DB::table('districts')->where('amphure_id', $id)->get(['id','zip_code','name_th']);
    return response()->json($subdistricts);
});


Auth::routes();

