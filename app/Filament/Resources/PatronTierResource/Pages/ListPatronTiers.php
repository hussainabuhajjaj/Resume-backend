<?php

namespace App\Filament\Resources\PatronTierResource\Pages;

use App\Filament\Resources\PatronTierResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPatronTiers extends ListRecords
{
    protected static string $resource = PatronTierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
