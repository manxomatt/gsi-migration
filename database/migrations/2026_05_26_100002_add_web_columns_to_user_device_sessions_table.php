<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Extends shared user_device_sessions (mobile backend migration is source of truth).
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_device_sessions', function (Blueprint $table) {
            if (! Schema::hasColumn('user_device_sessions', 'session_driver')) {
                $table->string('session_driver', 20)->nullable()->after('session_uuid');
                $table->index('session_driver', 'uds_session_driver_idx');
            }
            if (! Schema::hasColumn('user_device_sessions', 'laravel_session_id')) {
                $table->string('laravel_session_id', 255)->nullable()->after('refresh_token_hash');
                $table->index('laravel_session_id', 'uds_laravel_session_id_idx');
            }
        });
    }

    public function down(): void
    {
        Schema::table('user_device_sessions', function (Blueprint $table) {
            if (Schema::hasColumn('user_device_sessions', 'laravel_session_id')) {
                $table->dropIndex('uds_laravel_session_id_idx');
                $table->dropColumn('laravel_session_id');
            }
            if (Schema::hasColumn('user_device_sessions', 'session_driver')) {
                $table->dropIndex('uds_session_driver_idx');
                $table->dropColumn('session_driver');
            }
        });
    }
};
