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
    // -----------------------------
    // CASELAW CATEGORY PIVOT
    // -----------------------------
    Schema::create('caselaw_category_pivot', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('caselaw_id');
        $table->unsignedBigInteger('category_id');

        $table->timestamps();

        // Short FK names
        $table->foreign('caselaw_id', 'caselaw_catpivot_cl_fk')
              ->references('id')
              ->on('case_laws')
              ->onDelete('cascade');

        $table->foreign('category_id', 'caselaw_catpivot_cat_fk')
              ->references('id')
              ->on('db_categories')
              ->onDelete('cascade');
    });


    // -----------------------------
    // LEGAL INSTRUMENT CATEGORY PIVOT
    // -----------------------------
    Schema::create('legal_instrument_category_pivot', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('legal_instrument_id');
        $table->unsignedBigInteger('category_id');

        $table->timestamps();

        // Short FK names
        $table->foreign('legal_instrument_id', 'li_catpivot_li_fk')
              ->references('id')
              ->on('legal_instruments')
              ->onDelete('cascade');

        $table->foreign('category_id', 'li_catpivot_cat_fk')
              ->references('id')
              ->on('db_categories')
              ->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('caselaw_category_pivot');

         Schema::dropIfExists('legal_instrument_category_pivot');
    }
};
