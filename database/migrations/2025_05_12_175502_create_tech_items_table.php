<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tech_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tech_category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('icon_url_or_svg', 2048)->nullable(); // URL to image or SVG code
            $table->integer('proficiency_level')->nullable(); // e.g., 1-5 or 1-100
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tech_items');
    }
};