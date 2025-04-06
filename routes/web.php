<?php
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\AnalyticsController;
use  App\Http\Controllers\MessageLogController;
use  App\Http\Controllers\Auth\LoginController;
// Public routes (accessible without authentication)

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login']);
    Route::view('/register', 'admin.register')->name('register');
});


// Authenticated routes
Route::middleware(['auth'])->group(function () {
 
    
    // Dashboard
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/home', 'admin.home')->name('home');
    Route::view('/profile', 'profile')->name('profile');
    
    // Farmer Management
    Route::prefix('admin')->group(function () {
        Route::get('/farmer-registration', [AdminController::class, 'farmerRegistration'])
            ->name('admin.farmer.registration');
        Route::post('/farmers/store', [AdminController::class, 'storeFarmer'])
            ->name('admin.farmers.store');
        Route::get('/farmers', [AdminController::class, 'showFarmers'])
            ->name('admin.farmers');
               // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
    
    // Analytics
    Route::get('/analytics', [AnalyticsController::class, 'index'])
        ->name('admin.analytics');
});
?>