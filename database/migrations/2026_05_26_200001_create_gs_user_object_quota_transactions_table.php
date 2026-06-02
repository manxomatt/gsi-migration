<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gs_user_object_quota_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->string('type', 32);
            $table->integer('delta');
            $table->unsignedInteger('used_count');
            $table->unsignedInteger('quota_limit')->nullable();
            $table->string('imei', 20)->nullable()->index();
            $table->string('source', 64)->nullable();
            $table->integer('actor_user_id')->nullable()->index();
            $table->text('notes')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gs_user_object_quota_transactions');
    }
};
