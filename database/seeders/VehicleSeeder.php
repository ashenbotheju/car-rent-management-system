<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vehicles')->insert([
            [
                'brand' => 'Toyota',
                'model' => 'Corolla',
                'fuel_type' => 'Petrol',
                'fuel_efficiency' => '15 km/l',
                'year' => 2020,
                'color' => 'White',
                'seats' => 5,
                'engine' => '1.8L',
                'registration_number' => 'ABC-1234',
                'mileage' => 25000,
                'daily_rate' => 7500.00,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Honda',
                'model' => 'Civic',
                'fuel_type' => 'Diesel',
                'fuel_efficiency' => '18 km/l',
                'year' => 2021,
                'color' => 'Black',
                'seats' => 5,
                'engine' => '2.0L',
                'registration_number' => 'XYZ-5678',
                'mileage' => 18000,
                'daily_rate' => 9500.00,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
