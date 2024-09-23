<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResolutionResource\Pages;
use App\Filament\Resources\ResolutionResource\RelationManagers;
use App\Models\Resolution;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResolutionResource extends Resource
{
    protected static ?string $model = Resolution::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('resolution_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('resolution_date')
                    ->required(),
                Forms\Components\Select::make('conclusion_id')
                    ->relationship('conclusion', 'number_in')
                    ->required(),
                Forms\Components\Select::make('approval_company_id')
                    ->relationship('approval_company', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('resolution_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('resolution_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('conclusion.number_in')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('approval_company.name')
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
            'index' => Pages\ListResolutions::route('/'),
            'create' => Pages\CreateResolution::route('/create'),
            'edit' => Pages\EditResolution::route('/{record}/edit'),
        ];
    }
}
