<?php

namespace App\Imports;

use Illuminate\Support\Facades\Log;


use App\Models\LegalInstrument;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\State;
use App\Models\CaseLawCategory;
use Illuminate\Support\Str;

class LegalInstrumentImport implements ToModel, WithHeadingRow
{
    protected $countryId;
    protected $stateId;

    public function __construct($stateId = null, $categoryId = null)
    {
        $this->stateId = $stateId;
        $this->categoryId = $categoryId;
    }

    public function model(array $row)
    {
        //Log::info('Import Row Data:', $row);
        
        // Skip empty rows
        if (empty($row['title'])) {
            return null;
        }


        $title_row = $row['title'] ?? $row['Title'] ?? null;

        if (empty(trim($title_row))) {
          
            return null;
        }


         $stateId_value = null; // from form or null

        if (!$stateId_value && !empty($row['state'])) {
            $stateName = trim($row['state']);

            // Case-insensitive search
            $state = State::whereRaw('LOWER(name) = ?', [Str::lower($stateName)])->first();

            if ($state) {
                $stateId_value = $state->id;
            } else {
                // Optional: create new state if not found
                // $state = State::create(['name' => ucfirst($stateName), 'country_id' => $row['country_id'] ?? null]);
                // $stateId = $state->id;

                // Or skip / log missing state
                \Log::warning('State not found in DB: '.$stateName);
            }
        }




        $legalInst = LegalInstrument::create([
            'title' => $row['title'] ?? null,
            'year' => $row['year'] ?? null,
            'document_number' => $row['code'] ?? null,
            'headnote' => $row['headnote'] ?? null,
            'state_id' => $stateId_value ?? null,
        ]);

        if (!empty($row['category'])) {

            // explode comma-separated categories → array
            $categoryNames = explode(',', $row['category']);

            $categoryIds = [];

            foreach ($categoryNames as $catName) {
                $catName = trim($catName);

                if ($catName == '') continue;

                // find or create category
                $category = CaseLawCategory::firstOrCreate([
                    'name' => $catName
                ]);

                $categoryIds[] = $category->id;
            }

            // attach to pivot table
            $legalInst->categories()->sync($categoryIds);
        }


    }
}