<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PatientlistController;
use App\Http\Controllers\EmrPoliclinicController;

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


Route::get('/',[frontendController::class,'index'])->name('devault');

Route::get('/test',[frontendController::class, 'indexfrontend']);

Route::get('/new-appointment/{doctorID}/{date}',[frontendController::class, 'show'])->name('create.appointment');

Route::Group(['middleware'=>['auth','patient']], function(){
    Route::post('/book/appointment',[frontendController::class ,'store'])->name('booking.appointment');
    Route::get('/my-booking',[frontendController::class ,'mybooking'])->name('my.booking');
    route::get('/user-profile',[ProfileController::class, 'index'])->name('profile');
    route::post('/create-profile',[ProfileController::class, 'store'])->name('profile.store');
    route::post('/profile-image',[ProfileController::class, 'profileImage'])->name('profile.image');
    Route::get('/my-prescription',[FrontendController::class, 'myPrescription'])->name('my.prescription');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::Group(['middleware'=>['auth','admin']], function(){
    Route::resource('doctor',DoctorController::class);
    Route::get('/patients',[PatientlistController::class,'index'])->name('patient');
	Route::get('/patients/all',[PatientlistController::class, 'allTimeAppointment'])->name('all.appointments');
	Route::get('/status/update/{id}',[PatientlistController::class, 'toggleStatus'])->name('update.status');
	Route::resource('department',DepartmentController::class);
});

Route::Group(['middleware'=>['auth','doctor']], function(){
    Route::resource('appointment',AppointmentController::class);
    Route::post('/appointment/check',[AppointmentController::class, 'check'])->name('appointment.check');
    Route::post('/appointment/update',[AppointmentController::class, 'updateTime'])->name('updateTime');
     Route::get('/appointmenthome',[AppointmentController::class, 'Testing'])->name('cobalagi');

    Route::get('patient-today',[PrescriptionController::class, 'index'])->name('patients.today');

	Route::post('/prescription',[PrescriptionController::class, 'store'])->name('prescription');
	Route::get('/prescription/{userId}/{date}',[PrescriptionController::class, 'show'])->name('prescription.show');
	Route::get('/prescribed-patients',[PrescriptionController::class, 'patientsFromPrescription'])->name('prescribed.patients');

    Route::get('/emr/policlinik',[EmrPoliclinicController::class,'index'])->name('emr.policlinic');
});