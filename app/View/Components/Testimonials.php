<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Testimonial;

class Testimonials extends Component
{
    public $testimonials;

    public function __construct()
    {
        $this->testimonials = Testimonial::all();
    }

    public function render()
    {
        return view('components.testimonials');
    }
}
