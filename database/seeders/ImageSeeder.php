<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('images')->insert([
            // For vehicle_id = 1
            ['vehicle_id' => 1, 'url' => 'https://example.com/vehicles/toyota1.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['vehicle_id' => 1, 'url' => 'https://example.com/vehicles/toyota2.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            // For vehicle_id = 2
            ['vehicle_id' => 2, 'url' => 'https://example.com/vehicles/honda1.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['vehicle_id' => 2, 'url' => 'https://example.com/vehicles/honda2.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
