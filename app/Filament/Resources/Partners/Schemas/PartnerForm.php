<?php

namespace App\Filament\Resources\Partners\Schemas;


use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('name')
                    ->required(),
                FileUpload::make('logo')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->required(),
            ]);
    }
}
