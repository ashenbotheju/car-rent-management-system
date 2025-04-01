<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SocialController;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/vehicles', [HomeController::class, 'showVehicles'])->name('showVehicles');
Route::get('/support', [HomeController::class, 'showSupport'])->name('showSupport');
Route::get('/contact', [HomeController::class, 'showContact'])->name('showContact');
Route::get('/about', [HomeController::class, 'showAbout'])->name('showAbout');

Route::get('/vehicles/vehicle-overview', [VehicleController::class, 'vehicleOverview'])->name('vehicleOverview');

// Test Route (for debugging) @botheju
Route::get('/test', function () {
    return view('test');
});

// Google Authentication Routes using SocialController @bimsara
Route::get('auth/google', [SocialController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback'])->name('google.callback');

// Admin Routes  @bimsara
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});
