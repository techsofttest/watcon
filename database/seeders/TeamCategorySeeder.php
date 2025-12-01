<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\TeamCategory;

class TeamCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $categories = [
            ['name' => 'Project Team'],
            ['name' => 'Advisory board'],
            ['name' => 'Alumni'],
        ];

        foreach ($categories as $category) {
            TeamCategory::create($category);
        }
    }
}
