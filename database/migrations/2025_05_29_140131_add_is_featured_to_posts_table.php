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
        Schema::table(config('filamentblog.tables.prefix').'posts', function (Blueprint $table) {
            $table->unsignedBigInteger('is_featured')->default(0)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(config('filamentblog.tables.prefix').'posts', function (Blueprint $table) {
            $table->dropColumn('is_featured');
        });
    }
};
