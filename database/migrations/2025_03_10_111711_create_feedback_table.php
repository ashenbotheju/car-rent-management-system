<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id('feedback_id'); // Primary key
            $table->unsignedBigInteger('user_id'); // Without foreign key reference to users
            $table->unsignedBigInteger('vehicle_id'); // Without foreign key reference to vehicles
            $table->integer('rating')->checkBetween(1, 5); // Rating (1-5)
            $table->text('comment')->nullable(); // Feedback comment
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
