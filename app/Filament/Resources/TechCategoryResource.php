<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechCategoryResource\Pages;
use App\Filament\Resources\TechCategoryResource\RelationManagers\TechItemsRelationManager; // Import Relation Manager
use App\Models\TechCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TechCategoryResource extends Resource
{
    protected static ?string $model = TechCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Technologies'; // Grouping in sidebar
    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->unique(TechCategory::class, 'name', ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('order')->sortable(),
                Tables\Columns\TextColumn::make('techItems.count') // Display count of related items
                    ->label('Items Count')
                    ->counts('techItems'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('order');
    }

    public static function getRelations(): array
    {
        return [
            TechItemsRelationManager::class, // Register the relation manager
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTechCategories::route('/'),
            'create' => Pages\CreateTechCategory::route('/create'),
            'edit' => Pages\EditTechCategory::route('/{record}/edit'),
         //   'view' => Pages\ViewTechCategory::route('/{record}'),
        ];
    }
}