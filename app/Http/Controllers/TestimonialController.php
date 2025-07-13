<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('welcome', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'rating' => 'required|numeric',
            'testimonial' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('testimonials', 'public');

        Testimonial::create([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'rating' => $validated['rating'],
            'testimonial' => $validated['testimonial'],
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Testimonial added successfully');
    }
}
