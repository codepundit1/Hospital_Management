<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;




Route::get('/', [HomeController::class,'index']);
Route::get('/home', [HomeController::class,'redirect']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Doctor
Route::get('view_doctor/', [AdminController::class,'viewDoctor']);
Route::get('add_doctor/', [AdminController::class,'add']);
Route::post('store_doctor/', [AdminController::class,'store'])->name('addDoctor');
Route::get('delete_doctor/{id}', [AdminController::class, 'deleteDoctor']);
Route::get('edit_doctor/', [AdminController::class, 'editDoctor']);




//admin view appointment
Route::get('view_appointment/', [AdminController::class,'viewAppointment']);
Route::get('approve/{id}', [AdminController::class, 'approved']);
Route::get('cancel/{id}', [AdminController::class, 'canceled']);





//APOINTMENT
Route::post('apointments/', [HomeController::class,'apointment'])->name('apointments');

//user show appointment
Route::get('myappointments/', [HomeController::class, 'myappointment'])->name('myappointments');
Route::get('cancel_appoint/{id}', [HomeController::class, 'deleteAppointment']);

