<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\Admin\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

// Route::get('/vehicles', [HomeController::class, 'showVehicles'])->name('showVehicles');
Route::get('/vehicles', [VehicleController::class, 'vehicles'])->name('showVehicles');

Route::get('/support', [HomeController::class, 'showSupport'])->name('showSupport');
Route::get('/contact', [HomeController::class, 'showContact'])->name('showContact');
Route::get('/about', [HomeController::class, 'showAbout'])->name('showAbout');

Route::get('/vehicles/{vehicle_id}', [VehicleController::class, 'vehicleDetails'])->name('vehicle.details');

// Test Route (for debugging) @botheju
Route::get('/test', function () {
    return view('test');
});

// Google Authentication Routes using SocialController @bimsara
Route::get('auth/google', [SocialController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback'])->name('google.callback');

// Profile routes (required by Jetstream)
// Route::middleware(['auth'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
//     Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
// });

//Route::get('send-mail', [MailController::class, 'index']);
