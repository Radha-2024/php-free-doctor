<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\Admin\Auth\LoginController as AdminLogin;
use App\Http\Controllers\Doctor\Auth\LoginController as DoctorLogin;
use App\Http\Controllers\Doctor\Auth\RegisterController as DoctorRegister;
use App\Http\Controllers\Customer\Auth\LoginController as CustomerLogin;
use App\Http\Controllers\Customer\Auth\RegisterController as CustomerRegister;
// routes/web.php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Doctor\DashboardController as DoctorDashboard;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboard;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Default Laravel home route (optional)
Route::get('/', function () {
    return view('welcome');
});

// =========================
// Admin Routes (Login Only)
// =========================
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLogin::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLogin::class, 'login']);
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    })->middleware('auth:admin')->name('admin.dashboard');
});

// =========================
// Doctor Routes (Login + Register)
// =========================
Route::prefix('doctor')->group(function () {
    // Register
    Route::get('/register', [DoctorRegister::class, 'showRegisterForm'])->name('doctor.register');
    Route::post('/register', [DoctorRegister::class, 'register']);

    // Login
    Route::get('/login', [DoctorLogin::class, 'showLoginForm'])->name('doctor.login');
    Route::post('/login', [DoctorLogin::class, 'login']);

    // Dashboard
    Route::get('/dashboard', function () {
        return 'Doctor Dashboard';
    })->middleware('auth:doctor')->name('doctor.dashboard');
});

// =========================
// Customer Routes (Login + Register)
// =========================
Route::prefix('customer')->group(function () {
    // Register
    Route::get('/register', [CustomerRegister::class, 'showRegisterForm'])->name('customer.register');
    Route::post('/register', [CustomerRegister::class, 'register']);
    Route::get('/verify-email/{id}', [CustomerRegister::class, 'verifyEmail'])->name('verify.email');

    // Login
    Route::get('/login', [CustomerLogin::class, 'showLoginForm'])->name('customer.login');
    Route::post('/login', [CustomerLogin::class, 'login']);

    // Dashboard
    Route::get('/dashboard', function () {
        return 'Customer Dashboard';
    })->middleware('auth:customer')->name('customer.dashboard');
});


Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::post('/logout', [AdminDashboard::class, 'logout'])->name('logout');
});

Route::prefix('doctor')->name('doctor.')->middleware('auth:doctor')->group(function () {
    Route::get('/dashboard', [DoctorDashboard::class, 'index'])->name('dashboard');
    Route::post('/logout', [DoctorDashboard::class, 'logout'])->name('logout');
});

Route::prefix('customer')->name('customer.')->middleware('auth:customer')->group(function () {
    Route::get('/dashboard', [CustomerDashboard::class, 'index'])->name('dashboard');
    Route::post('/logout', [CustomerDashboard::class, 'logout'])->name('logout');
});
=======

Route::get('/', function () {
    return view('welcome');
});
>>>>>>> c9ef566beeef94a341361821ac3aec52ff445c2f
