<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('/home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('/admin');

Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->name('dashboard.index');

Route::get('/patient', function () {
    return view('admin.patient.patient_list');
})->name('patient.patient');

Route::get('/patient/add', function () {
    return view('admin.patient.patient_add');
})->name('patient.patient_add');

Route::get('/patient/detail', function () {
    return view('admin.patient.patient_detail');
})->name('patient.patient_detail');


Auth::routes();

