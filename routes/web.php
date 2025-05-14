<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Models\Reservation;
use App\Http\Controllers\StripePaymentController;


Route::get('/', [HomeController::class, 'home'])->name('home');


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');


// Authentication Routes
Route::middleware(['guest'])->group(function () {
    // Google Authentication
    Route::get('auth/google', [SocialController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback'])->name('google.callback');
});

// Public Routes
Route::get('/vehicles', [VehicleController::class, 'vehicles'])->name('showVehicles');
Route::get('/support', [HomeController::class, 'showSupport'])->name('showSupport');
Route::get('/contact', [HomeController::class, 'showContact'])->name('showContact');
Route::get('/about', [HomeController::class, 'showAbout'])->name('showAbout');
Route::get('/vehicles/{vehicle_id}', [VehicleController::class, 'vehicleDetails'])->name('vehicle.details');

// Email Verification Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');
});

// Verified User Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('user.profile');

    // ... other protected routes that require verified email
});

// Sanctum/Jetstream Routes (if needed)
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Your Jetstream routes here
});
Route::get('/stripe-payment', [StripePaymentController::class, 'showForm'])->name('stripe.form');
Route::post('/stripe-payment', [StripePaymentController::class, 'processPayment'])->name('stripe.payment');
Route::get('/payment', function () {
    return view('payment');
})->name('payment');

Route::get('/print-daily-revenue', function () {
    $records = Reservation::query()
        ->selectRaw('DATE(created_at) as day, SUM(total_cost) as revenue')
        ->where('status', 'confirmed')
        ->groupBy('day')
        ->orderBy('day', 'desc')
        ->get();

    return view('reports.daily-revenue', compact('records'));
})->name('print.daily.revenue'); // Important for route() helper

