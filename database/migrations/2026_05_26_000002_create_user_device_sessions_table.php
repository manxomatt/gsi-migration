<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_device_sessions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->foreignId('user_device_id')->constrained('user_devices')->cascadeOnDelete();
            $table->uuid('session_uuid');
            $table->string('token_hash', 64);
            $table->string('refresh_token_hash', 64)->nullable();
            $table->string('login_ip', 45)->nullable();
            $table->timestamp('logged_in_at');
            $table->timestamp('last_activity_at');
            $table->timestamp('logged_out_at')->nullable();
            $table->timestamp('expires_at');
            $table->boolean('is_active')->default(true);
            $table->string('logout_reason', 50)->nullable();
            $table->timestamps();

            $table->unique('session_uuid');
            $table->index('token_hash');
            $table->index('refresh_token_hash');
            $table->index(['user_id', 'is_active']);
            $table->index(['user_device_id', 'is_active']);
            $table->index('last_activity_at');
            $table->index('expires_at');
            $table->index(['is_active', 'expires_at']);

            $table->foreign('user_id')
                ->references('id')
                ->on('gs_users')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_device_sessions');
    }
};
