<?php

namespace App\Filament\Forms\Components;

use Filament\Forms\Components\Field;

class CkEditor extends Field
{
    protected string $view = 'filament.forms.components.ck-editor';

    protected ?string $uploadUrl = null;

    public function uploadUrl(?string $url): static
    {
        $this->uploadUrl = $url;

        return $this;
    }

    public function getUploadUrl(): ?string
    {
        return $this->uploadUrl;
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->dehydrateStateUsing(fn ($state) => $state);
    }
}