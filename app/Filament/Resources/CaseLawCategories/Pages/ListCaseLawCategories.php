<?php

namespace App\Filament\Resources\CaseLawCategories\Pages;

use App\Filament\Resources\CaseLawCategories\CaseLawCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCaseLawCategories extends ListRecords
{
    protected static string $resource = CaseLawCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
