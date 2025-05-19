<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('phone', 50)->nullable();
            $table->string('email')->unique();
            $table->text('about')->nullable();
            $table->string('cv_url', 2048)->nullable();
            $table->string('avatar_image_url', 2048)->nullable();
            $table->string('hero_background_image_url', 2048)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personal_infos');
    }
};