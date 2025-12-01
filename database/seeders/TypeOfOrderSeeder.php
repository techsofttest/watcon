<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeOfOrder;

class TypeOfOrderSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'Judgment',
            'Final Order',
            'Interim Order',
            'Interlocutory Order',
            'Consent Order',
            'Dismissal Order',
            'Direction Order',
            'Review Order',
            'Modification Order',
            'Stay Order',
            'Contempt Order',
            'Remand Order',
            'Writ Order',
            'Order on Admission',
            'Order on Costs',
            'Order on Execution',
        ];

        foreach ($types as $type) {
            TypeOfOrder::updateOrCreate(['name' => $type]);
        }
    }
}