<?php

namespace App\Filament\Resources\LegalInstruments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
class LegalInstrumentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('title')
            ->searchable(),
            TextColumn::make('state.name')
            ->label('State')
            ->searchable()
            ->sortable(),
            TextColumn::make('category.name')
            ->label('Category')
            ->searchable()
            ->sortable(),
            TextColumn::make('year')
                    ->searchable(),
            TextColumn::make('document_number')
                   ->label('Doc No')
                   ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                //EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
