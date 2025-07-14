<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Models\User;

class SendWelcomeEmail
{
    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        /** @var User $user */
        $user = $event->user;

        if (!$user->welcome_sent) {
            Mail::to($user->email)->send(new WelcomeMail($user));

            // Optional: mark welcome sent to avoid duplicates
            $user->welcome_sent = true;
            $user->save();
        }
    }
}
