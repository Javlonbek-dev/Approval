<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConclusionResource\Pages;
use App\Filament\Resources\ConclusionResource\RelationManagers;
use App\Models\Conclusion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ConclusionResource extends Resource
{
    protected static ?string $model = Conclusion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('number_out')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('number_in')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_in')
                    ->required(),
                Forms\Components\DatePicker::make('date_out')
                    ->required(),
                Forms\Components\Select::make('act_id')
                    ->relationship('act', 'act_number')
                    ->required(),
                Forms\Components\Select::make('executor_id')
                    ->relationship('executor', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number_out')
                    ->searchable(),
                Tables\Columns\TextColumn::make('number_in')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_in')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_out')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('act.act_number')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('executor.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListConclusions::route('/'),
            'create' => Pages\CreateConclusion::route('/create'),
            'edit' => Pages\EditConclusion::route('/{record}/edit'),
        ];
    }
}
