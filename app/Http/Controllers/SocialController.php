<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;

class SocialController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Find or create user
            $user = User::findByGoogleIdOrEmail($googleUser) ?? $this->createUserFromGoogle($googleUser);

            // Update Google data if needed
            if (empty($user->google_id)) {
                $user->updateGoogleData($googleUser);
            }

            Auth::login($user, true);

            return redirect()
                ->intended('/')
                ->with('status', 'Logged in with Google successfully!');
        } catch (\Exception $e) {
            logger()->error('Google Auth Failed: ' . $e->getMessage());
            return redirect('/login')
                ->with('error', 'Google authentication failed. Please try again.');
        }
    }

    protected function createUserFromGoogle($googleUser): User
    {
        return User::create([
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'google_id' => $googleUser->getId(),
            'password' => bcrypt(str()->random(24)),
            'email_verified_at' => now(),
            'role' => User::ROLE_USER,
        ]);
    }
}
