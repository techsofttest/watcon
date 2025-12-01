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
        Schema::table('publications', function (Blueprint $table) {
            
            $table->foreignId('category_id')->nullable()->constrained('publication_categories')->cascadeonDelete();

            $table->string('slug')->unique();

            $table->text('description')->nullable();

            $table->string('meta_title')->nullable();

            $table->string('meta_description')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->dropColumn('slug');
            $table->dropColumn('description');
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_description');
        });
    }
};
