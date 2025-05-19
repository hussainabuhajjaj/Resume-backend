<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperienceResource\Pages;
use App\Filament\Resources\ExperienceResource\RelationManagers\DescriptionPointsRelationManager; // Make sure this is uncommented
use App\Models\Experience;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Portfolio Content';
    protected static ?int $navigationSort = 10;
    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Experience Details')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Job Title / Role')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('company_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('company_website')
                            
                            ->maxLength(2048)
                            ->nullable(),
                        Forms\Components\TextInput::make('location')
                            ->maxLength(255)
                            ->nullable(),
                        Forms\Components\DatePicker::make('start_date')
                            ->required(),
                        Forms\Components\DatePicker::make('end_date')
                            ->nullable()
                            ->reactive()
                            ->afterStateUpdated(fn (Forms\Set $set, $state) => $set('is_current', $state === null)),
                        Forms\Components\Toggle::make('is_current')
                            ->label('Currently Working Here')
                            ->default(false)
                            ->reactive()
                            ->afterStateUpdated(fn (Forms\Set $set, $state) => $state ? $set('end_date', null) : null),
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Order of display on the site (lower numbers first).'),
                    ]),
                Forms\Components\Section::make('Summary') // Renamed, as points are now in Relation Manager
                    ->schema([
                        Forms\Components\Textarea::make('short_description')
                            ->rows(3)
                            ->columnSpanFull()
                            ->nullable()
                            ->helperText('A brief summary of the role.'),
                        // The Repeater for descriptionPoints has been REMOVED from here.
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('company_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('start_date')->date()->sortable(),
                Tables\Columns\TextColumn::make('end_date')->date()->sortable()->placeholder('Present'),
                Tables\Columns\IconColumn::make('is_current')->label('Current')->boolean(),
                Tables\Columns\TextColumn::make('order')->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_current'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('start_date', 'desc')
            ->reorderable('order');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        // The infolist will still work correctly as it loads 'descriptionPoints' via the relationship
        return $infolist
            ->schema([
                InfolistSection::make('Experience Details')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('title')->label('Job Title')->columnSpanFull(),
                        TextEntry::make('company_name'),
                        TextEntry::make('company_website')->url(fn(?string $state): string => $state ?? '#', true)->placeholder('N/A'),
                        TextEntry::make('location')->placeholder('N/A'),
                        TextEntry::make('start_date')->date(),
                        TextEntry::make('end_date')->date()->placeholder('Present'),
                        TextEntry::make('is_current')->label('Currently Working')->badge()->color(fn ($state): string => $state ? 'success' : 'gray'),
                    ]),
                InfolistSection::make('Summary & Key Points')
                    ->schema([
                        TextEntry::make('short_description')->markdown()->placeholder('No summary provided.')->columnSpanFull(),
                        // This will still display points on the main view page for Experience.
                        // The Relation Manager will be used for CRUD operations on points.
                        RepeatableEntry::make('descriptionPoints')
                            ->label('Key Responsibilities / Achievements')
                            ->relationship() // Important: ensures it loads the relation
                            ->schema([
                                TextEntry::make('point_text')
                                    ->markdown()
                                    ->listWithLineBreaks(),
                            ])
                            ->placeholder('No specific points listed.')
                            ->grid(1)
                            ->columnSpanFull(),
                    ]),
                 InfolistSection::make('Meta')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('order')->label('Display Order'),
                        TextEntry::make('created_at')->dateTime(),
                        TextEntry::make('updated_at')->dateTime(),
                    ])->collapsible()->collapsed(),
            ]);
    }

    public static function getRelations(): array
    {
        // Register the Relation Manager here
        return [
            DescriptionPointsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExperiences::route('/'),
            'create' => Pages\CreateExperience::route('/create'),
            'edit' => Pages\EditExperience::route('/{record}/edit'),
          //  'view' => Pages\ViewExperience::route('/{record}'),
        ];
    }
}