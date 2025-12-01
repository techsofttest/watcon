<?php

namespace App\Filament\Resources\LegalInstruments;

use App\Filament\Resources\LegalInstruments\Pages\CreateLegalInstrument;
use App\Filament\Resources\LegalInstruments\Pages\EditLegalInstrument;
use App\Filament\Resources\LegalInstruments\Pages\ListLegalInstruments;
use App\Filament\Resources\LegalInstruments\Schemas\LegalInstrumentForm;
use App\Filament\Resources\LegalInstruments\Tables\LegalInstrumentsTable;
use App\Models\LegalInstrument;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LegalInstrumentResource extends Resource
{

    protected static ?int $navigationSort = 3;


    protected static ?string $model = LegalInstrument::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Legal Instrument';

    public static function form(Schema $schema): Schema
    {
        return LegalInstrumentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LegalInstrumentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLegalInstruments::route('/'),
            'create' => CreateLegalInstrument::route('/create'),
            'edit' => EditLegalInstrument::route('/{record}/edit'),
        ];
    }
}
