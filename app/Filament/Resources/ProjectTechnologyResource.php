<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectTechnologyResource\Pages;
use App\Filament\Resources\ProjectTechnologyResource\RelationManagers;
use App\Models\ProjectTechnology;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectTechnologyResource extends Resource
{
    protected static ?string $model = ProjectTechnology::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjectTechnologies::route('/'),
            'create' => Pages\CreateProjectTechnology::route('/create'),
            'edit' => Pages\EditProjectTechnology::route('/{record}/edit'),
        ];
    }
}
