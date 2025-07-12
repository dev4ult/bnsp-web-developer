<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::resource('/login', LoginController::class)->only(['index', 'store']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('/registration', RegistrationController::class)->only(['index', 'store']);

Route::get('/', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/registration-document/{id}', [PDFController::class, 'index'])->name('registration-document')->middleware('auth');
Route::resource('/profile', ProfileController::class)->only(['index', 'update'])->middleware('auth');
Route::resource('/student', StudentController::class)->middleware('admin');
Route::put('/student-profile/{id}', [StudentController::class, 'update_profile'])->name('update-profile-student')->middleware('admin');
