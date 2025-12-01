<?php

namespace App\Filament\Resources\CaseLaws;

use App\Filament\Resources\CaseLaws\Pages\CreateCaseLaw;
use App\Filament\Resources\CaseLaws\Pages\EditCaseLaw;
use App\Filament\Resources\CaseLaws\Pages\ListCaseLaws;
use App\Filament\Resources\CaseLaws\Schemas\CaseLawForm;
use App\Filament\Resources\CaseLaws\Tables\CaseLawsTable;
use App\Models\CaseLaw;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CaseLawResource extends Resource
{

    protected static ?int $navigationSort = 2;

    protected static ?string $model = CaseLaw::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Case Laws';



    public static function form(Schema $schema): Schema
    {
        return CaseLawForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CaseLawsTable::configure($table);
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
            'index' => ListCaseLaws::route('/'),
            'create' => CreateCaseLaw::route('/create'),
            'edit' => EditCaseLaw::route('/{record}/edit'), 
        ];
    }
}
