<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use App\Models\TeamCategory;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('team_category_id')
                ->label('Category')
                ->options(TeamCategory::pluck('name', 'id'))
                ->searchable()
                ->nullable()
                ->preload(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('university')
                    ->default(null),
                TextInput::make('designation')
                    ->required(),
                TextInput::make('email_address')
                    ->email()
                    ->required(),
                TextInput::make('linkedin'),
                RichEditor::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('profile_url')
                    ->url()
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->required()
                    ->columnSpanFull()
            ]);
    }
}
