<?php

namespace App\Filament\Resources\TechItemResource\Pages;

use App\Filament\Resources\TechItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTechItem extends CreateRecord
{
    protected static string $resource = TechItemResource::class;
}
