<?php

namespace App\Filament\Resources\CaseLawCategories;

use App\Filament\Resources\CaseLawCategories\Pages\CreateCaseLawCategory;
use App\Filament\Resources\CaseLawCategories\Pages\EditCaseLawCategory;
use App\Filament\Resources\CaseLawCategories\Pages\ListCaseLawCategories;
use App\Filament\Resources\CaseLawCategories\Schemas\CaseLawCategoryForm;
use App\Filament\Resources\CaseLawCategories\Tables\CaseLawCategoriesTable;
use App\Models\CaseLawCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CaseLawCategoryResource extends Resource
{

    protected static ?int $navigationSort = 1;

    protected static ?string $model = CaseLawCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Category';

    protected static ?string $navigationLabel = 'Categories';



    public static function getModelLabel(): string
    {
        return 'Category';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Categories';
    }



    public static function form(Schema $schema): Schema
    {
        return CaseLawCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CaseLawCategoriesTable::configure($table);
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
            'index' => ListCaseLawCategories::route('/'),
            'create' => CreateCaseLawCategory::route('/create'),
            'edit' => EditCaseLawCategory::route('/{record}/edit'),
        ];
    }
}
