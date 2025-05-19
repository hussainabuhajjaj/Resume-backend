<?php

namespace App\Filament\Resources\ExperienceDescriptionPointResource\Pages;

use App\Filament\Resources\ExperienceDescriptionPointResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExperienceDescriptionPoint extends EditRecord
{
    protected static string $resource = ExperienceDescriptionPointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
