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

            $user = User::updateOrCreate(
                ['email' => $googleUser->email],
                [
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => bcrypt(str()->random(24)),
                    'email_verified_at' => now(),
                ]
            );

            Auth::login($user, true); // Force persistent session

            // Debugging check (temporary)
            if (Auth::check()) {
                return redirect()->intended('/'); // Go directly to authenticated page
            }

            return redirect('/'); // Fallback if auth fails

        } catch (\Exception $e) {
            logger()->error('Google Auth Error: ' . $e->getMessage());
            return redirect('/login')->with('error', 'Google login failed');
        }
    }
}
