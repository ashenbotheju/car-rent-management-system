<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    function home()
    {
        if (Auth::check()) {
            logger('User is authenticated: ' . Auth::user()->email);
        } else {
            logger('User is NOT authenticated');
        }
        //return view('welcome');

        $testimonials = Testimonial::all();
        return view('welcome', compact('testimonials'));
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
