<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            ['name' => 'India'],
            ['name' => 'Pakistan'],
            ['name' => 'Nepal'],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}