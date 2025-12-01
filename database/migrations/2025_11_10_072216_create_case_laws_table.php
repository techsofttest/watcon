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

        Schema::create('caselaw_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
       
        Schema::create('case_laws', function (Blueprint $table) {
            $table->id();
            $table->foreignId('caselaw_category_id')
                ->nullable()
                ->constrained('caselaw_categories')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreignId('type_of_order_id')
                ->nullable()
                ->constrained('type_of_orders')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreignId('country_id')
                ->nullable()
                ->constrained('countries')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreignId('state_id')
                ->nullable()
                ->constrained('states')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->string('parties');
            $table->string('slug')->unique();
            $table->integer('year');
            $table->string('document_number');
            $table->string('court')->nullable();
            $table->string('date_of_judgement')->nullable();
            $table->text('headnote');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_laws');
    }
};
