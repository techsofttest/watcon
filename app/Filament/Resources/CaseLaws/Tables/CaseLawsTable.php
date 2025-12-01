<?php

namespace App\Filament\Resources\CaseLaws\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class CaseLawsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('parties')
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
            TextColumn::make('case_no')
                    ->label('Case No')
                   ->searchable(),
            TextColumn::make('document_number')
                ->label('Doc No')
                ->searchable(),
            TextColumn::make('headnote')->words(10)
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
