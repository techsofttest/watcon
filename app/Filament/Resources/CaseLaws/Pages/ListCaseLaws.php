<?php

namespace App\Filament\Resources\CaseLaws\Pages;

use App\Filament\Resources\CaseLaws\CaseLawResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCaseLaws extends ListRecords
{
    protected static string $resource = CaseLawResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label('Import Excel')
            ,
        ];
    }

  

}
