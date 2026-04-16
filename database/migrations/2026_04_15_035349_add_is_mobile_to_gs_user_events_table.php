<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('gs_user_events', function (Blueprint $table) {
            $table->boolean('is_mobile')->default(false)->comment('Flag indicating if the data was created from mobile app');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gs_user_events', function (Blueprint $table) {
            $table->dropColumn('is_mobile');
        });
    }
};
