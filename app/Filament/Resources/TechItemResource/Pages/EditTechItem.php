<?php

namespace App\Filament\Resources\TechItemResource\Pages;

use App\Filament\Resources\TechItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTechItem extends EditRecord
{
    protected static string $resource = TechItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
