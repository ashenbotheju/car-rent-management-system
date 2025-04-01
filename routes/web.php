<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SocialController;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

// Test Route (for debugging) @botheju
Route::get('/test', function () {
    return view('test');
});

// Google Authentication Routes using SocialController @bimsara
Route::get('auth/google', [SocialController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback'])->name('google.callback');


