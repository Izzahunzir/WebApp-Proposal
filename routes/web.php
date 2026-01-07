<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;

// 1. Public Pages
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

// 2. Logout Route
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// 3. Authenticated Routes (Staff & Students)
Route::middleware(['auth'])->group(function () {
    
    // --- STUDENT ROUTES ---
    Route::get('/student/home', function () {
        return view('student_home');
    })->name('dashboard');

    Route::get('/student/profile', [ProfileController::class, 'index'])->name('student.profile');
    Route::get('/student/history', [BookingController::class, 'history'])->name('student.history');

    // --- STAFF ROUTES ---
    Route::get('/staff/dashboard', [AuthController::class, 'staffDashboard'])->name('staff.dashboard');
    Route::get('staff/profile', [DashboardController::class, 'profile'])->name('staff.profile');
    Route::patch('/bookings/{id}/status', [BookingController::class, 'updateStatus'])->name('status.update');

    // --- SHARED BOOKING ROUTES ---
    Route::get('/booking/{sport}', [BookingController::class, 'selectDate'])->name('booking.select');
    Route::get('/booking/{sport}/{date}', [BookingController::class, 'showSlots'])->name('slots.view');
    Route::post('/book', [BookingController::class, 'store'])->name('booking.store');

    Route::delete('/bookings/{id}', [AuthController::class, 'destroyBooking'])->name('bookings.destroy');
});