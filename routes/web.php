<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;

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

