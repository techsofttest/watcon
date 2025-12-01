<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('publication_categories')->insert([
            ['name' => 'Books', 'slug' => 'books'],
            ['name' => 'Articles / Book Chapters', 'slug' => 'articles'],
        ]);
    }
}
