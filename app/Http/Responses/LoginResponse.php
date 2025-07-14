<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        return redirect()->intended(route('dashboard'))->with(
            'toast_success',
            'Welcome back, ' . $user->name . '!'
        );
    }
}
