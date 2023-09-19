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
        Schema::create('article_creation_schedules', function (Blueprint $table) {
            $table->id();
            $table->json('topics');
            $table->string('language', 50)->nullable();
            $table->integer('max_length')->nullable();
            $table->string('voice_tone', 50)->nullable();
            $table->float('creativity')->nullable();
            $table->integer('interval')->default(10);
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_creation_schedules');
    }
};
