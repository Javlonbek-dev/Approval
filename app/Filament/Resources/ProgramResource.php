<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Filament\Resources\ProgramResource\RelationManagers;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('program_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('program_date')
                    ->required(),
                Forms\Components\DatePicker::make('assessment_period')
                    ->required(),
                Forms\Components\FileUpload::make('files')
                    ->multiple(),
                Forms\Components\Select::make('contract_id')
                    ->relationship('contract', 'contract_number')
                    ->required(),
                Forms\Components\Select::make('status_id')
                    ->relationship('status', 'name')
                    ->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('program_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('program_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('assessment_period')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contract.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status.name')
                    ->icons([
                        'heroicon-o-check-circle' => 'active',      // Green checkmark for 'active'
                        'heroicon-o-x-circle' => 'inactive',        // Red cross for 'inactive'
                        'heroicon-o-exclamation-circle' => 'suspended', // Warning icon for 'suspended'
                        'heroicon-o-arrow-path' => 'extended',         // Circular arrow for 'extended'
                    ])
                    ->colors([
                        'success' => 'active',        // Green for 'active'
                        'danger' => 'inactive',       // Red for 'inactive'
                        'warning' => 'suspended',     // Yellow for 'suspended'
                        'secondary' => 'extended'     // Gray for 'extended'
                    ]),
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
                Tables\Actions\ViewAction::make()
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
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'view' => Pages\ViewProgram::route('/{record}'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
