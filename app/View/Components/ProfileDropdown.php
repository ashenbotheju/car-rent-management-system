<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class ProfileDropdown extends Component
{
    public $user;

    public function __construct()
    {
        $this->user = Auth::user(); // Use Auth facade instead of auth() helper
    }

    public function render()
    {
        // Only render if user is authenticated
        return $this->user ? view('components.profile-dropdown') : '';
    }
}
