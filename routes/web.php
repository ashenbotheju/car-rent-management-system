<?php

use App\Models\User;
use App\Models\Reservation;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\MailController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\Admin\DashboardController;



Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');
//Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
// Testimonials
//Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');


// Public Vehicle & Info Routes
Route::get('/vehicles/{vehicle_id}', [VehicleController::class, 'vehicleDetails'])->name('vehicle.details');

Route::get('/vehicl', [VehicleController::class, 'vehicles'])->name('showVehicles');

Route::get('/support', [HomeController::class, 'showSupport'])->name('showSupport');
Route::get('/contact', [HomeController::class, 'showContact'])->name('showContact');
Route::get('/about', [HomeController::class, 'showAbout'])->name('showAbout');

// Booking
Route::get('/reservation', [BookingController::class, 'CreateBooking'])->name('booking.create');

// Google OAuth

Route::middleware(['guest'])->group(function () {
    Route::get('auth/google', [SocialController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback'])->name('google.callback');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');
});

// Verified User Routes
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'show'])->name('user.profile');
});

// Public Vehicle & Info Routes
Route::get('/vehicles/{vehicle_id}', [VehicleController::class, 'vehicleDetails'])->name('vehicle.details');
Route::get('/vehicl', [VehicleController::class, 'vehicles'])->name('showVehicles');
Route::get('/support', [HomeController::class, 'showSupport'])->name('showSupport');
Route::get('/contact', [HomeController::class, 'showContact'])->name('showContact');
Route::get('/about', [HomeController::class, 'showAbout'])->name('showAbout');

// Booking
Route::get('/reservation', [BookingController::class, 'CreateBooking'])->name('booking.create');


// Stripe Payment Routes
Route::get('/stripe-payment', [StripePaymentController::class, 'showForm'])->name('stripe.form');
Route::post('/stripe-payment/{id}', [StripePaymentController::class, 'processPayment'])->name('stripe.payment');

Route::get('/payment', function () {
    return view('payment');
})->name('payment');


Route::controller(StripePaymentController::class)->group(function () {
    Route::get('stripe', 'stripe')->name('stripe.index');
    Route::get('stripe/checkout', 'stripeCheckout')->name('stripe.checkout');
    Route::get('stripe/checkout/success', 'stripeCheckoutSuccess')->name('stripe.checkout.success');
});



Route::get('/print-daily-revenue', function () {
    $records = Reservation::query()
        ->selectRaw('DATE(created_at) as day, SUM(total_cost) as revenue')
        ->where('status', 'confirmed')
        ->groupBy('day')
        ->orderBy('day', 'desc')
        ->get();

    return view('reports.daily-revenue', compact('records'));
})->name('print.daily.revenue');


Route::controller(StripePaymentController::class)->group(function () {
    Route::get('stripe', 'stripe')->name('stripe.index');
    Route::get('stripe/checkout', 'stripeCheckout')->name('stripe.checkout');
    Route::get('stripe/checkout/success', 'stripeCheckoutSuccess')->name('stripe.checkout.success');
});
