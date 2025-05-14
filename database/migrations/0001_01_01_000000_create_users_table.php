<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Creating the 'users' table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number', 15)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('role')->default(User::ROLE_DEFAULT);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        // Creating the 'password_reset_tokens' table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Creating the 'sessions' table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index(); // Foreign key reference to 'users' table
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Dropping the 'users' table
        Schema::dropIfExists('users');

        // Dropping the 'password_reset_tokens' table
        Schema::dropIfExists('password_reset_tokens');

        // Dropping the 'sessions' table
        Schema::dropIfExists('sessions');
    }
};
