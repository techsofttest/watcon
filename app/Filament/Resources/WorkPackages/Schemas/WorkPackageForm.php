<?php

namespace App\Filament\Resources\WorkPackages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class WorkPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
