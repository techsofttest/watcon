<?php

namespace App\Imports;

use App\Models\Caselaw;
use App\Models\CaseLawCategory;
use App\Models\State;
use App\Models\TypeOfOrder;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CaseLawImport implements ToModel, WithHeadingRow
{
    protected $stateId;
    protected $categoryId;
    protected $orderTypeId;

    public function __construct($stateId, $categoryId, $orderTypeId)
    {
        $this->stateId = $stateId;
        $this->categoryId = $categoryId;
        $this->orderTypeId = $orderTypeId;
    }

    /**
     * Make sure Excel starts reading from the first row (A1)
     */
    public function headingRow(): int
    {
        return 1;
    }

    public function model(array $row)
    {
        // Debug: you can uncomment this temporarily if you still have issues
        \Log::info('Row read:', $row);

        if (empty($row)) {
            //\Log::warning('Empty row encountered');
            return null;
        }

        $parties = $row['parties'] ?? $row['Parties'] ?? null;

        if (empty($parties)) {
            //\Log::warning('Skipping row: no parties field', $row);
            return null;
        }

        // Handle both lowercase or capitalized headings
        $parties = $row['parties'] ?? $row['Parties'] ?? null;

        // Skip blank rows or missing parties
        if (empty($parties)) {
            return null;
        }


        /*
        $categoryId = $this->categoryId; // value from form if selected

        if (!$categoryId && !empty($row['category'])) {
            // Try to find a matching category by name (case-insensitive)
            $categoryName = trim($row['category']);
            $category = CaseLawCategory::whereRaw('LOWER(name) = ?', [Str::lower($categoryName)])->first();

            // If category doesn't exist, optionally create it
            if (!$category) {
                $category = CaseLawCategory::create(['name' => ucfirst($categoryName)]);
            }

            $categoryId = $category->id;
        }
        */


        $stateId = null; // from form or null

        if (!$stateId && !empty($row['state'])) {
            $stateName = trim($row['state']);

            // Case-insensitive search
            $state = State::whereRaw('LOWER(name) = ?', [Str::lower($stateName)])->first();

            if ($state) {
                $stateId = $state->id;
            } else {
                // Optional: create new state if not found
                // $state = State::create(['name' => ucfirst($stateName), 'country_id' => $row['country_id'] ?? null]);
                // $stateId = $state->id;

                // Or skip / log missing state
                \Log::warning('State not found in DB: '.$stateName);
            }
        }



        $type_of_order = null; // from form or null

        if (!$type_of_order && !empty($row['type_of_order'])) {
            $type_name = trim($row['type_of_order']);

            // Case-insensitive search
            $type_row = TypeOfOrder::whereRaw('LOWER(name) = ?', [Str::lower($type_name)])->first();

            if ($type_row) {
                $type_of_order = $type_row->id;
            } else {
                // Optional: create new state if not found
                // $state = State::create(['name' => ucfirst($stateName), 'country_id' => $row['country_id'] ?? null]);
                // $stateId = $state->id;

                // Or skip / log missing state
            }
        }


        /*
        return new Caselaw([
            'parties' => trim($parties),
            'slug' => Str::slug($parties . '-' . ($row['year'] ?? '').$row['document_number']),
            'year' => $row['year'] ?? null,
            'case_no' => $row['case_no'] ?? null,
            'document_number' => $row['document_number'] ?? null,
            'date_of_judgement' => $row['date_of_judgement'] ?? null,
            'headnote' => $row['headnote'] ?? null,
            'state_id' => $this->stateId,
            'caselaw_category_id' => $categoryId,
            'type_of_order_id' => $this->orderTypeId,
        ]);
        */

         $caseLaw = CaseLaw::create([
            'parties' => $row['parties'],
            'slug' => \Str::slug($row['parties'] . '-' . $row['case_no']),
            'year' => $row['year'],
            'document_number' => $row['document_number'],
            'court' => $row['court'],
            'date_of_judgement' => $row['date_of_judgement'],
            'headnote' => $row['headnote'],
            'state_id' => $stateId,
            'country_id' => $row['country_id'] ?? null,
            'case_no' => $row['case_no'] ?? null,
            'type_of_order_id' => $type_of_order ?? null,
        ]);

        if (!empty($row['category'])) {

            // explode comma-separated categories → array
            $categoryNames = explode(',', $row['category']);

            $categoryIds = [];

            foreach ($categoryNames as $catName) {
                
                $catName = str_replace("\xC2\xA0", ' ', $catName); // replace NBSP with normal space
                $catName = preg_replace('/[\x{200B}-\x{200D}\x{FEFF}]/u', '', $catName);
                $catName = trim($catName);

                if ($catName == '') continue;

                // find or create category
                $category = CaseLawCategory::firstOrCreate([
                    'name' => $catName
                ]);

                $categoryIds[] = $category->id;
            }

            // attach to pivot table
            $caseLaw->categories()->sync($categoryIds);
        }

        return $caseLaw;

    }
}
