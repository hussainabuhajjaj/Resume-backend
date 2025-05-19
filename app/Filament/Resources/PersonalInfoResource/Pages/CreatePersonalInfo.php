<?php

namespace App\Filament\Resources\PersonalInfoResource\Pages;

use App\Filament\Resources\PersonalInfoResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePersonalInfo extends CreateRecord
{
    protected static string $resource = PersonalInfoResource::class;

    // After creating the record, redirect to its edit page.
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->record]);
    }

    // Prevent accessing the create page directly via URL if a record already exists.
    protected function authorizeAccess(): void
    {
        parent::authorizeAccess(); // Call Filament's default authorization

        // Our custom check: abort if canCreate() is false
        abort_if(!static::getResource()::canCreate(), 403, 'A Personal Info record already exists. You can edit the existing one.');
    }

    public function getTitle(): string | \Illuminate\Contracts\Support\Htmlable
    {
        return 'Create ' . static::getResource()::getModelLabel();
    }
}