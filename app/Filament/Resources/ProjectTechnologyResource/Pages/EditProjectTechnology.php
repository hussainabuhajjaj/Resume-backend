<?php

namespace App\Filament\Resources\ProjectTechnologyResource\Pages;

use App\Filament\Resources\ProjectTechnologyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectTechnology extends EditRecord
{
    protected static string $resource = ProjectTechnologyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
