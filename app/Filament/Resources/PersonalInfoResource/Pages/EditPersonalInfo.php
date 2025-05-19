<?php

namespace App\Filament\Resources\PersonalInfoResource\Pages;

use App\Filament\Resources\PersonalInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersonalInfo extends EditRecord
{
    protected static string $resource = PersonalInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            // Actions\DeleteAction::make(), // Usually not needed for a singleton
        ];
    }

    // Optionally, redirect to the view page after saving, or stay on edit
    // protected function getRedirectUrl(): ?string
    // {
    //     return $this->getResource()::getUrl('view', ['record' => $this->record]);
    // }

    public function getTitle(): string | \Illuminate\Contracts\Support\Htmlable
    {
        return 'Edit ' . static::getResource()::getModelLabel();
    }
}