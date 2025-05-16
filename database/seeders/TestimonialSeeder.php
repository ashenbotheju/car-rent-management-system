<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::insert([
            [
                'name' => 'John Doe',
                'position' => 'Software Engineer',
                'rating' => 4.8,
                'testimonial' => 'Fantastic experience! The car was clean and the service was top-notch.',
                'image' => 'images/testimonials/john.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'position' => 'Marketing Manager',
                'rating' => 5.0,
                'testimonial' => 'Absolutely loved the support and quick booking process. Highly recommended!',
                'image' => 'images/testimonials/jane.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Lee',
                'position' => 'Freelancer',
                'rating' => 4.5,
                'testimonial' => 'Good pricing, clean vehicle, and very helpful staff.',
                'image' => 'images/testimonials/michael.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
