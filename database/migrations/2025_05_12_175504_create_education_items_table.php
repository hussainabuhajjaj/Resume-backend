<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('education_items', function (Blueprint $table) {
            $table->id();
            $table->string('institution_name');
            $table->string('degree_or_certificate');
            $table->string('field_of_study')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable(); // Null if ongoing
            $table->string('grade_or_score')->nullable();
            $table->string('icon_name')->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('education_items');
    }
};