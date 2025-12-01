<?php

namespace App\Filament\Resources\Contents\Schemas;

use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

class ContentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('name')
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('content')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()->visible(fn ($record) => $record && $record->has_image == 1)
            ]);
    }
}
