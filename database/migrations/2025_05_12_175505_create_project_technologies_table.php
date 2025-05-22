<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Note: The model 'ProjectTechnology' was generated. We'll use this as a pivot table.
    // Laravel typically names pivot tables in singular alphabetical order: project_tech_item.
    // However, 'project_technologies' is also clear.
    // If you want to follow convention strictly, rename the table and model or just use belongsToMany without a model.
    // For this example, we'll stick to `project_technologies` as requested and use the model.
    public function up(): void
    {
        Schema::create('project_technologies', function (Blueprint $table) {
            $table->id(); // Or use composite primary key: $table->primary(['project_id', 'tech_item_id']);
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('tech_item_id')->constrained()->onDelete('cascade');
            // Add any additional pivot data if needed, e.g., $table->string('role_in_project')->nullable();
            $table->timestamps();

            $table->unique(['project_id', 'tech_item_id']); // Ensure unique pairings
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_technologies');
    }
};