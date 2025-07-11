<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    function home()
    {
        return view('welcome');
    }

    function login()
    {
        return view('auth.login');
    }

    function register()
    {
        return view('auth.register');
    }

    function showVehicles()
    {
        return view('vehicles');
    }

    function showSupport()
    {
        return view('support');
    }
    function showContact()
    {
        return view('contact');
    }
    function showAbout()
    {
        return view('about');
    }
    function logout()
    {
        Auth::logout();
        return view('welcome');
    }
}
