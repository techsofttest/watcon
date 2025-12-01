<?php

namespace App\Filament\Resources\LegalInstruments\Pages; // Adjust namespace to match your structure

use App\Filament\Resources\LegalInstruments\LegalInstrumentResource; // Adjust to match your Resource location
use Filament\Resources\Pages\CreateRecord;
use App\Imports\LegalInstrumentImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use App\Models\LegalInstrument;
use Illuminate\Support\Facades\DB;

class CreateLegalInstrument extends CreateRecord
{
    protected static string $resource = LegalInstrumentResource::class;
    
     public function getTitle(): string
    {
        return 'Import Legal Instruments';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {


        // Import from Excel instead of creating a single record
        if (isset($data['excel_file'])) {

            //LegalInstrument::truncate();
            
            $filePath = Storage::disk('local')->path($data['excel_file']);
            
            //DB::table('legal_instrument_category_pivot')->delete();
            // Delete main table rows
            //LegalInstrument::query()->delete();
            
            Excel::import(
                new LegalInstrumentImport(
                    $data['state_id'] ?? null,
                    $data['caselaw_category_id'] ?? null
                ),
                $filePath
            );
            
            Notification::make()
                ->title('Legal Instruments Imported Successfully')
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