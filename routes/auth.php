<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    // Custom welcome/login page
    Route::view('/', 'login')->name('login');
    
    Volt::route('register', 'pages.auth.register')
        ->name('register');

    // Point login to your existing welcome page
    Route::view('login', 'welcome')->name('login');
    
    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    // Email Verification
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    // Password Confirmation
    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');

    // Admin Dashboard Routes
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])
            ->name('admin.dashboard');
            
        Route::get('farmer-registration', [AdminController::class, 'farmerRegistration'])
            ->name('admin.farmer.registration');
            
        Route::post('farmers/store', [AdminController::class, 'storeFarmer'])
            ->name('admin.farmers.store');
            
        Route::get('farmers', [AdminController::class, 'showFarmers'])
            ->name('admin.farmers');
    });
});