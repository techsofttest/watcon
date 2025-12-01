<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        DB::table('blog_categories')->insert([
        [
            'title' => 'Blogs',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Events and News',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        ]);


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_categories');
    }
};
