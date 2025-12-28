<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\Auth\authController;
use App\Http\Controllers\Admin\dashboardcontroller;
use App\Http\Controllers\Admin\studentController;
use App\Http\Controllers\Admin\courseController;
use App\Http\Controllers\Admin\professorController;
use App\Http\Controllers\Admin\departmentController;
use App\Http\Controllers\Admin\enrollmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Public Routes ---
Route::get('/', [homeController::class, 'index'])->name('home.index');
Route::get('/about', [homeController::class, 'about'])->name('home.about');
Route::get('/contact', [homeController::class, 'contact'])->name('home.contact');

// --- Admin Login Routes (Specific to the image) ---
Route::get('/adminLogin', [authController::class, 'adminLogin'])->name('admin.login');
Route::post('/adminLogin', [authController::class, 'adminCheckLogin'])->name('admin.adminCheckLogin');

// --- Admin Dashboard & Resources ---
Route::middleware('auth:admin')->group(function () {
    
    Route::get('dashboard', [dashboardcontroller::class, 'index'])->name('dashboard');

    // Managing Students
    Route::resource('student', studentController::class)->names('student');

    // Managing Courses
    Route::resource('course', courseController::class)->names('course');

    // Managing Professors
    Route::resource('professor', professorController::class)->names('professor');

    // Managing Departments
    Route::resource('department', departmentController::class)->names('department');

    // Managing Enrollments
    Route::resource('enrollment', enrollmentController::class)->names('enrollment');

    // Admin Logout
    Route::post('adminLogout', [authController::class, 'logout'])->name('admin.logout');
});

// -----------------------------------------------------------------------
// 🚨 MISSING STUDENT ROUTES BELOW 🚨
// -----------------------------------------------------------------------
// If you want students to log in, you MUST add this part back:

Route::middleware('auth:student')->group(function () {
    Route::get('/student/portal', function () {
        return view('student.dashboard');
    })->name('student.dashboard');
});

// And you need the generic login route for your homepage button:
Route::get('/login', [authController::class, 'showLogin'])->name('login.show');
Route::post('/login', [authController::class, 'checkLogin'])->name('login.check');
Route::post('/logout', [authController::class, 'logout'])->name('logout');