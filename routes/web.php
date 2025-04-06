<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;

// Public routes (always accessible)
Route::middleware('guest')->group(function () {
 // Update login routes to use named routes consistently:
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Update register route:
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


});

// Authenticated routes (protected)
Route::middleware(['auth'])->group(function () {
    // Dashboard (only accessible after login)
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    
    // Other protected routes...
    Route::view('/home', 'admin.home')->name('home');
    Route::view('/profile', 'profile')->name('profile');
    
    // Farmer Management
    
        Route::get('/farmer-registration', [AdminController::class, 'create'])
        ->name('admin.farmer.registration');
        
   // In routes/web.php
Route::match(['get', 'post'], '/farmers', [AdminController::class, 'index'])
->name('admin.farmers');
        
    Route::get('/analytics', [AnalyticsController::class, 'index'])
        ->name('admin.analytics');
    
    
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/analytics', [AnalyticsController::class, 'index'])
        ->name('admin.analytics');
});