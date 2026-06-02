<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_devices', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->uuid('device_uuid');
            $table->string('device_name')->nullable();
            $table->string('platform', 20);
            $table->string('manufacturer', 100)->nullable();
            $table->string('os_version', 50)->nullable();
            $table->string('app_version', 50)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('push_token', 512)->nullable();
            $table->string('last_ip', 45)->nullable();
            $table->timestamp('last_activity_at')->nullable();
            $table->timestamp('first_seen_at')->useCurrent();
            $table->timestamps();

            $table->unique(['user_id', 'device_uuid']);
            $table->index('user_id');
            $table->index('last_activity_at');
            $table->index(['user_id', 'last_activity_at']);

            $table->foreign('user_id')
                ->references('id')
                ->on('gs_users')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_devices');
    }
};
