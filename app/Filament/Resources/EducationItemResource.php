<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationItemResource\Pages;
use App\Models\EducationItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EducationItemResource extends Resource
{
    protected static ?string $model = EducationItem::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?int $navigationSort = 30;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('institution_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('degree_or_certificate')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('field_of_study')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date'),
                Forms\Components\TextInput::make('grade_or_score')
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('institution_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('degree_or_certificate')->searchable(),
                Tables\Columns\TextColumn::make('field_of_study')->searchable(),
                Tables\Columns\TextColumn::make('start_date')->date()->sortable(),
                Tables\Columns\TextColumn::make('end_date')->date()->sortable(),
                Tables\Columns\TextColumn::make('order')->sortable(),
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
            ])
            ->reorderable('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEducationItems::route('/'),
            'create' => Pages\CreateEducationItem::route('/create'),
            'edit' => Pages\EditEducationItem::route('/{record}/edit'),
        ];
    }
}