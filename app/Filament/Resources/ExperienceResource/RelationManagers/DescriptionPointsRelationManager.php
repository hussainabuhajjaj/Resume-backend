<?php

namespace App\Filament\Resources\ExperienceResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
// Potentially add if you need soft deletes for description points
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;

class DescriptionPointsRelationManager extends RelationManager
{
    protected static string $relationship = 'descriptionPoints'; // Matches the method name in Experience model

    // This attribute is used for titles, breadcrumbs within the relation manager context if needed.
    // For a textarea, it might not be as useful as for a simple text input.
    // Filament might also infer this if the model has a $titleAttribute.
    protected static ?string $recordTitleAttribute = 'point_text';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('point_text')
                    ->label('Description Point')
                    ->required()
                    ->columnSpanFull() // Takes the full width of the modal form
                    ->rows(4), // Adjust rows as needed
                Forms\Components\TextInput::make('order')
                    ->label('Display Order')
                    ->numeric()
                    ->default(0)
                    ->required()
                    ->helperText('Order of this point within the experience (lower numbers first).'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            // recordTitleAttribute is often inferred or can be set if needed for display.
            // For a table, the columns define what's shown.
            ->columns([
                Tables\Columns\TextColumn::make('point_text')
                    ->label('Point Description')
                    ->limit(100) // Limit displayed text in table
                    ->wrap()     // Allow text to wrap
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Order')
                    ->sortable(),
            ])
            ->filters([
                // No filters typically needed for this simple relation
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(), // Button to add a new description point
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('order'); // Allow drag-and-drop reordering of points
    }
}