<?php

namespace App\Filament\Resources\CaseLawCategories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class CaseLawCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
