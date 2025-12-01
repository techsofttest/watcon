<?php

namespace App\Filament\Resources\CaseLaws\Pages;

use App\Filament\Resources\CaseLaws\CaseLawResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCaseLaw extends EditRecord
{
    protected static string $resource = CaseLawResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
