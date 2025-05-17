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
                'image' => 'testimonials/p1.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'position' => 'Marketing Manager',
                'rating' => 5.0,
                'testimonial' => 'Absolutely loved the support and quick booking process. Highly recommended!',
                'image' => 'testimonials/p2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Lee',
                'position' => 'Freelancer',
                'rating' => 4.5,
                'testimonial' => 'Good pricing, clean vehicle, and very helpful staff.',
                'image' => 'testimonials/p3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sara Williams',
                'position' => 'Travel Blogger',
                'rating' => 4.9,
                'testimonial' => 'Such a smooth experience. I felt safe and comfortable throughout the trip!',
                'image' => 'testimonials/p1.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Daniel Kim',
                'position' => 'Photographer',
                'rating' => 4.7,
                'testimonial' => 'Impressed with the professionalism and timely service. Will use again.',
                'image' => 'testimonials/p5.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Emily Davis',
                'position' => 'Event Planner',
                'rating' => 5.0,
                'testimonial' => 'Everything from booking to return was perfect. Excellent customer service!',
                'image' => 'testimonials/p6.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
