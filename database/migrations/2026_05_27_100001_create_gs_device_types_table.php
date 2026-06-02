<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gs_device_types', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 200);
            $table->string('type', 50);
            $table->text('command');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gs_device_types');
    }
};
