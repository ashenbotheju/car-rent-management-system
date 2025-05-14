<?php

namespace App\Http\Responses;

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
        return redirect()->route('login')->with([
            'status' => 'Registration successful! Please log in to continue.',
            'registered_email' => $request->email 
        ]);
    }
}
