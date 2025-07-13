<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $feedbacks = [];

        // Sample feedback comments
        $comments = [
            'Great experience with this vehicle!',
            'The car was clean and comfortable.',
            'Had some issues with the AC.',
            'Perfect for our family trip.',
            'Smooth ride overall.',
            'The vehicle had some scratches not mentioned before.',
            'Excellent service and vehicle condition.',
            'Fuel efficiency was better than expected.',
            'Could use some interior upgrades.',
            'Would definitely rent again!',
            'The pickup process took too long.',
            'Everything was as described.',
            'Minor issues but nothing major.',
            'Best rental experience so far.',
            'The GPS system was outdated.',
        ];

        // Generate 50 feedback entries
        for ($i = 1; $i <= 50; $i++) {
            $feedbacks[] = [
                'user_id' => rand(1, 20), // Assuming you have at least 20 users
                'vehicle_id' => rand(1, 15), // Assuming you have at least 15 vehicles
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'created_at' => Carbon::now()->subDays(rand(1, 90)), // Random date in last 90 days
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('feedback')->insert($feedbacks);
    }
}
