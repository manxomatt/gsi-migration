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
        Schema::table('gs_user_usage', function (Blueprint $table) {
            $table->integer('login')->nullable()->default(0)->change();
            $table->integer('email')->nullable()->default(0)->change();
            $table->integer('sms')->nullable()->default(0)->change();
            $table->integer('webhook')->nullable()->default(0)->change();
            $table->integer('api')->nullable()->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gs_user_usage', function (Blueprint $table) {
            $table->integer('login')->nullable()->change();
            $table->integer('email')->nullable()->change();
            $table->integer('sms')->nullable()->change();
            $table->integer('webhook')->nullable()->change();
            $table->integer('api')->nullable()->change();
        });
    }
};
