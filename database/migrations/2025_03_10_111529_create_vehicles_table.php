<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Ensure InnoDB engine
            $table->id('vehicle_id');
            $table->string('brand', 50);
            $table->string('model', 50);
            $table->string('fuel_type', 50)->nullable();
            $table->string('fuel_efficiency', 50)->nullable();
            $table->integer('year');
            $table->string('color', 50)->nullable();
            $table->integer('seats')->nullable();
            $table->string('engine', 50);
            $table->string('registration_number', 20)->unique();
            $table->integer('mileage')->nullable();
            $table->decimal('daily_rate', 10, 2);
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
