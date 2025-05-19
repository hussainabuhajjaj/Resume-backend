<?php

namespace App\Filament\Resources\PersonalInfoResource\Pages;

use App\Filament\Resources\PersonalInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPersonalInfo extends ViewRecord
{
    protected static string $resource = PersonalInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    // Optional: Title for the view page
    public function getTitle(): string
    {
        return 'View ' . static::getResource()::getModelLabel();
    }
}