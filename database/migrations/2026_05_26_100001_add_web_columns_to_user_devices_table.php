<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Extends the shared user_devices table (owned by mobile backend migration)
 * with columns required for web browser tracking.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_devices', function (Blueprint $table) {
            if (! Schema::hasColumn('user_devices', 'browser_name')) {
                $table->string('browser_name', 64)->nullable()->after('user_agent');
            }
            if (! Schema::hasColumn('user_devices', 'browser_version')) {
                $table->string('browser_version', 32)->nullable()->after('browser_name');
            }
            if (! Schema::hasColumn('user_devices', 'browser_fingerprint')) {
                $table->char('browser_fingerprint', 64)->nullable()->after('browser_version');
                $table->index('browser_fingerprint', 'user_devices_browser_fingerprint_idx');
            }
            if (! Schema::hasColumn('user_devices', 'device_type')) {
                $table->string('device_type', 20)->nullable()->default('unknown')->after('platform');
            }
        });
    }

    public function down(): void
    {
        Schema::table('user_devices', function (Blueprint $table) {
            if (Schema::hasColumn('user_devices', 'browser_fingerprint')) {
                $table->dropIndex('user_devices_browser_fingerprint_idx');
                $table->dropColumn('browser_fingerprint');
            }
            foreach (['browser_name', 'browser_version', 'device_type'] as $column) {
                if (Schema::hasColumn('user_devices', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
