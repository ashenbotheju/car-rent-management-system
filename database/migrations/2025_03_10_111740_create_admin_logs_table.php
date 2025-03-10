<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admin_logs', function (Blueprint $table) {
            $table->id('log_id'); // Primary key
            $table->unsignedBigInteger('admin_id'); // Without foreign key reference to users (admins)
            $table->string('action', 255); // Admin action
            $table->text('details')->nullable(); // Details of the action
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin_logs');
    }
};
