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
        Schema::create('open_ai_settings', function (Blueprint $table) {
            $table->id();
            $table->string('api_key')->nullable();
            $table->string('default_model',100)->default('text-davinci-003')->nullable();
            $table->string('default_language',50)->default('en-US')->nullable();
            $table->string('default_voice_tone',50)->default('Professional')->nullable();
            $table->float('default_creativity')->default(0.75)->nullable();
            $table->integer('max_input_length')->default(1000)->nullable();
            $table->integer('max_output_length')->default(1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('open_ai_settings');
    }
};
