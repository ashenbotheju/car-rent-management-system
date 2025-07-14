<?php

namespace App\Http\Responses;
use Laracasts\Flash\Flash;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * Redirect to the login page after successful registration
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        Flash::success('Registration successful! Please log in to continue.');
        return redirect()->route('login')->with([
            'toast_success' => 'Registration successful! Please log in to continue.',
            'status' => 'Registration successful! Please log in to continue.',
            'registered_email' => $request->email
        ]);
    }
}
