<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\StudentMateriController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\TutorDashboardController;
use App\Http\Controllers\TutorProfileController;
use App\Http\Controllers\TutorClassController;
use App\Http\Controllers\TutorMateriController;
use App\Http\Controllers\Admin\AdminDashboardController;

// ==================== AUTH ====================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// ==================== STUDENT ====================
Route::prefix('students')->name('students.')
    ->middleware(['auth','role:siswa'])
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('students.dashboard');
        })->name('dashboard');

        Route::get('/profile', [StudentProfileController::class, 'edit'])->name('profile');
        Route::put('/profile', [StudentProfileController::class, 'update'])->name('profile.update');

        Route::get('/materi', [StudentMateriController::class, 'index'])->name('materi');
        Route::get('/classes', [StudentClassController::class, 'index'])->name('classes');
});

// ==================== TUTOR ====================
Route::prefix('tutor')->name('tutor.')
    ->middleware(['auth','role:tutor'])
    ->group(function () {

        Route::get('/dashboard', [TutorDashboardController::class, 'index'])->name('dashboard');

        Route::get('/profile', [TutorProfileController::class, 'edit'])->name('profile');
        Route::put('/profile', [TutorProfileController::class, 'update'])->name('profile.update');

        Route::get('/classes', [TutorClassController::class, 'index'])->name('classes');
        Route::get('/materials', [TutorMateriController::class, 'index'])->name('materials');
});

// ==================== ADMIN ====================
Route::prefix('admin')->name('admin.')
    ->middleware(['auth','role:admin'])
    ->group(function() {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/students', [AdminDashboardController::class, 'students'])->name('students');
        Route::get('/tutors', [AdminDashboardController::class, 'tutors'])->name('tutors');
        Route::get('/classes', [AdminDashboardController::class, 'classes'])->name('classes');
        Route::get('/enrollments', [AdminDashboardController::class, 'enrollments'])->name('enrollments');
        Route::get('/admins', [AdminDashboardController::class, 'admins'])->name('admins');
});

// ---------------------- HOME --------------------
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\RegisterController;

Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/program', [HomeController::class, 'program'])->name('program');
Route::get('/biaya', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Form Pendaftaran
Route::get('/daftar', [RegistrationController::class, 'create'])->name('register.create');
// web.php
Route::post('/daftar', [RegistrationController::class, 'store'])->name('daftar.store');

