<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use App\Models\BlogCategory;
use Filament\Schemas\Schema;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Select::make('category_id')
                    ->label('Type')
                    ->options(BlogCategory::orderBy('title','asc')->pluck('title', 'id'))
                    ->searchable()
                    ->nullable()
                    ->preload(),
                TextInput::make('title')
                    ->required(),
                //TextInput::make('slug')
                    //->required(),
                RichEditor::make('description')
                    ->columnSpanFull(),
                FileUpload::make('featured_image')
                    ->image()
                    ->required(),
                FileUpload::make('pdf_file')
                ->directory('blogs'),
                TextInput::make('meta_title')
                    ->required(),
                TextInput::make('meta_description')
                    ->required(),
                DatePicker::make('publish_date')->required(),
            ]);
    }
}
