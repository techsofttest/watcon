<?php

namespace App\Filament\Resources\LegalInstruments\Schemas;

use Filament\Schemas\Schema;
use App\Models\State;
use App\Models\Country;
use App\Models\CaseLawCategory;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class LegalInstrumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                
                Select::make('state_id')
                    ->label('State')
                    ->options(State::orderBy('name','asc')->pluck('name', 'id'))
                    ->searchable()
                    ->nullable()
                    ->preload(),
                    
                Select::make('caselaw_category_id')
                    ->label('Category')
                    ->options(CaseLawCategory::orderBy('name','asc')->pluck('name', 'id'))
                    ->searchable()
                    ->nullable()
                    ->preload(),
                    
                FileUpload::make('excel_file')
                    ->label('Upload Excel File')
                    ->required()
                    ->acceptedFileTypes([
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'text/csv',
                    ])
                    ->columnSpanFull()
                    ->disk('local')
                    ->directory('imports/legalinstruments')
                    ->visibility('private')
            ]);
    }
}