<?php

namespace App\Filament\Resources\PersonalInfoResource\Pages;

use App\Filament\Resources\PersonalInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Route; // Import Route facade

class ListPersonalInfos extends ListRecords
{
    protected static string $resource = PersonalInfoResource::class;

    public function getTitle(): string | Htmlable
    {
        return static::getResource()::canCreate() ?
               ('Create ' . static::getResource()::getModelLabel()) :
               ('View ' . static::getResource()::getModelLabel());
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->visible(fn (): bool => static::getResource()::canCreate()),
        ];
    }

    public function mount(): void
    {
        parent::mount();

        if (!static::getResource()::canCreate()) {
            $record = static::getResource()::getModel()::first();
            if ($record) {
                // Simpler check: if we are on the 'index' route of this resource, then redirect.
                // This avoids redirecting if we somehow landed on this ListRecords page
                // when an action (like a modal from another context) was already active.
                // For a typical singleton ListRecords, this is usually sufficient.
                $resourceIndexRouteName = static::getResource()::getRouteBaseName() . '.index';

                if (Route::currentRouteName() === $resourceIndexRouteName) {
                    redirect(static::getResource()::getUrl('edit', ['record' => $record]));
                }
            }
        }
    }
}