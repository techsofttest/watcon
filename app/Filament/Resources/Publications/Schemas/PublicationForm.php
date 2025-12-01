<?php

namespace App\Filament\Resources\Publications\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use App\Models\PublicationCategory;
use Filament\Schemas\Schema;

class PublicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Select::make('category_id')
                ->label('Category')
                ->options(PublicationCategory::pluck('name','id'))
                ->searchable()
                ->preload(),
                TextInput::make('title')
                    ->required(),
                RichEditor::make('description'),
                FileUpload::make('image')
                    ->image()
                    ->required(),
                TextInput::make('meta_title'),
                TextInput::make('meta_description'),
                TextInput::make('url')
                    ->url()
                    ->required(),
            ]);
    }
}
