<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    // Redirect user to Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google callback after authentication
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check if the user already exists in the database
            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(str()->random(24)), // Generate a random password
                ]
            );

            // Log in the user
            Auth::login($user);

            return redirect('/dashboard');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Failed to authenticate with Google.');
        }
    }
}
