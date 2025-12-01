<?php

namespace App\Filament\Resources\CaseLawCategories\Pages;

use App\Filament\Resources\CaseLawCategories\CaseLawCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCaseLawCategory extends EditRecord
{
    protected static string $resource = CaseLawCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
