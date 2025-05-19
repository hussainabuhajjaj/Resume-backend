<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechItemResource\Pages;
use App\Models\TechItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TechItemResource extends Resource
{
    protected static ?string $model = TechItem::class;
    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    protected static ?string $navigationGroup = 'Technologies';
    protected static ?int $navigationSort = 11;
    protected static ?string $recordTitleAttribute = 'name'; // For global search

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tech_category_id')
                    ->relationship('techCategory', 'name') // 'name' is the title attribute of TechCategory
                    ->searchable()
                    ->preload()
                    ->required()
                    ->createOptionForm([ // Allow creating new category on the fly
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0),
                    ]),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('icon_url_or_svg') // Textarea if SVG code is long
                    ->label('Icon (URL or SVG)')
                    ->maxLength(2048)
                    ->rows(3)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('proficiency_level')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->helperText('A number between 0-100 representing proficiency.'),
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
                Tables\Columns\TextColumn::make('techCategory.name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('proficiency_level')->sortable(),
                Tables\Columns\TextColumn::make('order')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tech_category_id')
                    ->relationship('techCategory', 'name')
                    ->label('Category'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            // If you want to list projects using this tech item:
            // RelationManagers\ProjectsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTechItems::route('/'),
            'create' => Pages\CreateTechItem::route('/create'),
            'edit' => Pages\EditTechItem::route('/{record}/edit'),
          //  'view' => Pages\ViewTechItem::route('/{record}'),
        ];
    }
}