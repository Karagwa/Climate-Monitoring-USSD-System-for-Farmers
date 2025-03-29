<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\AdminController;

Route::view('/', 'admin.home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
Route::get('/farmer registration',[AdminController::class, 'farmer_registration']);
