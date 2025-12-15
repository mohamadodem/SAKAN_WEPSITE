<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;

// الصفحة الرئيسية
Route::get('/', function () {
    return view('welcome');
});

// المصادقة
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// الطالب
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/student/profile/create', [StudentController::class, 'showCreateProfile'])->name('student.profile.create');
    Route::post('/student/profile/create', [StudentController::class, 'createProfile']);
    Route::get('/student/profile/edit', [StudentController::class, 'showEditProfile'])->name('student.profile.edit');
    Route::post('/student/profile/edit', [StudentController::class, 'updateProfile']);
    Route::get('/student/request/create', [StudentController::class, 'showCreateRequest'])->name('student.request.create');
    Route::post('/student/request/create', [StudentController::class, 'createRequest']);
    Route::get('/student/requests/history', [StudentController::class, 'requestHistory'])->name('student.requests.history'); // جديد
});
// المدير
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // قبول الطلب - خطوتين
    Route::get('/admin/request/{id}/accept', [AdminController::class, 'showAcceptUnit'])->name('admin.request.accept.form');
    Route::post('/admin/request/{id}/rooms', [AdminController::class, 'showRoomsForm'])->name('admin.show.rooms');
    Route::post('/admin/request/{id}/accept', [AdminController::class, 'acceptRequest'])->name('admin.request.accept');
    
    // رفض الطلب
    Route::post('/admin/request/{id}/reject', [AdminController::class, 'rejectRequest'])->name('admin.request.reject');
});