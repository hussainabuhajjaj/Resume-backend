<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonalInfoResource\Pages; // Correct namespace for Pages
use App\Models\PersonalInfo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Infolists\Components\TextEntry;
 
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\RichEditor;
use Asmit\FilamentUpload\Forms\Components\AdvancedFileUpload;
 
class PersonalInfoResource extends Resource
{
    protected static ?string $model = PersonalInfo::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'My Info';
    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(50)
                            ->nullable(),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true), // Important for edit, allows current record's email
                    ]),
                Forms\Components\Section::make('Details & Assets')
                    ->schema([
                      RichEditor::make('about')
                           
                            ->columnSpanFull()
                            ->nullable(),
                        AdvancedFileUpload::make('cv_url')
                ->label('Upload PDF')
                ->pdfPreviewHeight(400) // Customize preview height
                ->pdfDisplayPage(1) // Set default page
                ->pdfToolbar(true) // Enable toolbar
                ->pdfZoomLevel(100) // Set zoom level
                //->pdfFitType(PdfViewFit::FIT) // Set fit type
                ->pdfNavPanes(true) // Enable navigation panes('')
                            ->label('CV/Resume URL')
                          
                            ->columnSpanFull()
                            ->nullable(),
                        Forms\Components\FileUpload::make('avatar_image_url')
                            ->label('Avatar Image URL')
                            ->image()
                            ->openable()
                            ->panelLayout('grid')->removeUploadedFileButtonPosition('right')
                            ->deletable(true)
                            ->columnSpanFull()
                            ->nullable(),
                        Forms\Components\FileUpload::make('hero_background_image_url')
                            ->label('Hero Background Image URL')
                            ->image()
                            ->deletable(true)
                            ->columnSpanFull()
                            ->nullable(),
                    ]),
            ]);
    }

    // Table is mostly for the List page if no record exists or if you choose to list it
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar_image_url')
                    ->label('Avatar')
                    ->circular()
                    ->defaultImageUrl(url('/images/default-avatar.png')), // Create this placeholder
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                // No DeleteAction for singleton unless explicitly needed
            ])
            ->bulkActions([]) // No bulk actions
            ->emptyStateActions([
                // The CreateAction visibility is handled by `canCreate()` and `ListPersonalInfos::getHeaderActions()`
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfolistSection::make('Contact Information')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('title'),
                        TextEntry::make('phone')->placeholder('Not provided'),
                        TextEntry::make('email')->copyable()->copyMessage('Email address copied!'),
                    ]),
                InfolistSection::make('About Me')
                    ->schema([
                        TextEntry::make('about')->markdown()->placeholder('Not provided')->columnSpanFull(),
                    ]),
                InfolistSection::make('Assets & Links')
                    ->columns(2)
                    ->schema([
                        ImageEntry::make('avatar_image_url')
                            ->label('Avatar')
                            ->circular()->height(100)
                            ->defaultImageUrl(url('/images/default-avatar.png')),
                        ImageEntry::make('hero_background_image_url')
                            ->label('Hero Background')
                            ->height(100)
                            ->defaultImageUrl(url('/images/default-hero.png')), // Create this placeholder
                        TextEntry::make('cv_url')
                            ->label('CV/Resume')
                            ->url(fn (?string $state): string => $state ?? '#', true)
                            ->placeholder('Not provided'),
                    ]),
                InfolistSection::make('Timestamps')->columns(2)->schema([
                    TextEntry::make('created_at')->dateTime(),
                    TextEntry::make('updated_at')->dateTime(),
                ])->collapsible()->collapsed(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPersonalInfos::route('/'),    // Will handle redirect or show create
            'create' => Pages\CreatePersonalInfo::route('/create'),
            'edit' => Pages\EditPersonalInfo::route('/{record}/edit'),
            'view' => Pages\ViewPersonalInfo::route('/{record}'),
        ];
    }

    /**
     * Determines if a new record can be created.
     * For a singleton, this is true only if no records exist.
     */
    public static function canCreate(): bool
    {
        return !static::getModel()::exists();
    }

    public static function getPluralModelLabel(): string
    {
        return 'Personal Information'; // Used in titles, breadcrumbs
    }

    public static function getModelLabel(): string
    {
        return 'Personal Info'; // Used for single record context
    }
}