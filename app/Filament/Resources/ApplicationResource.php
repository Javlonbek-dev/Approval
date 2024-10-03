<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplicationResource\Pages;
use App\Filament\Resources\ApplicationResource\RelationManagers;
use App\Models\Application;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('number_in')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('number_out')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_in')
                    ->required(),
                Forms\Components\DatePicker::make('date_out')
                    ->required(),
                Forms\Components\FileUpload::make('files')
                    ->multiple(),
                Forms\Components\Select::make('laboratory_id')
                    ->relationship('laboratory', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number_in')
                    ->searchable(),
                Tables\Columns\TextColumn::make('number_out')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_in')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_out')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('laboratory.name')
                    ->numeric(),
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
                Tables\Actions\ViewAction::make(),
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Company information')
                    ->columns(1)
                    ->schema([
                        TextEntry::make('laboratory.company.name')
                            ->label('Company Name'),
                        TextEntry::make('laboratory.company.address')
                            ->label('Company Address'),
                        TextEntry::make('laboratory.company.phone')
                            ->label('Company Phone'),
                        TextEntry::make('laboratory.company.email')
                            ->label('Company Email'),
                        TextEntry::make('laboratory.company.bank_visits')
                            ->label('Company Bank Visits'),
                        TextEntry::make('laboratory.company.stir')
                            ->label('Inn'),
                        TextEntry::make('laboratory.company.manager')
                            ->label('Manager'),
                        TextEntry::make('laboratory.company.manager_phone')
                            ->label('Manager Phone Number')
                    ]),
                Section::make('Laboratory information')
                    ->columns(1)
                    ->schema([
                        TextEntry::make('laboratory.name')
                            ->label('Laboratory Name'),
                        TextEntry::make('laboratory.address')
                            ->label('Laboratory Address'),
                        TextEntry::make('laboratory.phone')
                            ->label('Laboratory Phone'),
                        TextEntry::make('laboratory.email')
                            ->label('Laboratory Email'),
                        TextEntry::make('laboratory.manager')
                            ->label('Laboratory Manager'),
                    ]),
                Section::make('Application information')
                    ->columns(1)
                    ->schema([
                        TextEntry::make('number_in')
                            ->label('Number In'),
                        TextEntry::make('number_out')
                            ->label('Number Out'),
                        TextEntry::make('date_in')
                            ->label('Date In'),
                        TextEntry::make('date_out')
                            ->label('Date Out'),
                    ])
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApplications::route('/'),
            'create' => Pages\CreateApplication::route('/create'),
            'edit' => Pages\EditApplication::route('/{record}/edit'),
            'view' => Pages\ViewApplication::route('/{record}'),
        ];
    }
}
