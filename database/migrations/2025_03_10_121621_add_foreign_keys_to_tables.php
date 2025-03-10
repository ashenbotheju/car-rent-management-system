<!-- <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Adding foreign keys to the 'payments' table
        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('reservation_id')->references('reservation_id')->on('reservations')->onDelete('cascade');
        });

        // Adding foreign keys to the 'admin_logs' table
        Schema::table('admin_logs', function (Blueprint $table) {
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });
        // Adding foreign keys to the 'reservations' table
        Schema::table('reservations', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('vehicle_id')->on('vehicles')->onDelete('cascade');
    });
          // Adding foreign keys to the 'feedback' table
          Schema::table('feedback', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('vehicle_id')->on('vehicles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        // Dropping foreign keys from the 'reservations' table
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['vehicle_id']);
        });

        // Dropping foreign keys from the 'payments' table
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['reservation_id']);
        });

        // Dropping foreign keys from the 'feedback' table
        Schema::table('feedback', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['vehicle_id']);
        });

        // Dropping foreign keys from the 'admin_logs' table
        Schema::table('admin_logs', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
        });
    }
};
