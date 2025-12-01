<?php

namespace App\Filament\Resources\CaseLaws\Pages;

use App\Filament\Resources\CaseLaws\CaseLawResource;
use Filament\Resources\Pages\CreateRecord;
use App\Imports\CaseLawImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use App\Models\CaseLaw;
use Illuminate\Support\Facades\DB;

class CreateCaseLaw extends CreateRecord
{
    protected static string $resource = CaseLawResource::class;

    public function getTitle(): string
    {
        return 'Import Case Laws';
    }


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Import from Excel instead of creating a single record
        if (isset($data['excel_file'])) {
            $filePath = Storage::disk('local')->path($data['excel_file']);

            DB::table('caselaw_category_pivot')->delete();
            // Delete main table rows
            CaseLaw::query()->delete();

            Excel::import(
                new CaseLawImport(
                    $data['state_id'] ?? null,
                    $data['caselaw_category_id'] ?? null,
                    $data['type_of_order_id'] ?? null
                ),
                $filePath
            );
            
            Notification::make()
                ->title('Case Laws Imported Successfully')
                ->success()
                ->send();
            
            // Redirect to list page
            $this->redirect($this->getResource()::getUrl('index'));
            
            // Stop the normal record creation
            $this->halt();
        }
        
        return $data;
    }
}