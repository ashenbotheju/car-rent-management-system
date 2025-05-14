<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller; // Add this import
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller // Ensure it extends the correct class
{
    public function __construct()
    {
        $this->middleware('auth'); // This will now work
    }

    public function show()
    {
        return view('profile.show', [
            'user' => Auth::user()
        ]);
    }
}
