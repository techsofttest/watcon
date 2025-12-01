<?php

namespace App\Filament\Resources\SeoMetas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SeoMetaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('page')
                    ->required(),
                TextInput::make('meta_title')
                    ->required(),
                TextInput::make('meta_description')
                    ->required(),
                Textarea::make('custom_head_scripts')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('custom_body_scripts')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
