<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActResource\Pages;
use App\Filament\Resources\ActResource\RelationManagers;
use App\Models\Act;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ActResource extends Resource
{
    protected static ?string $model = Act::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('act_date')
                    ->required(),
                Forms\Components\TextInput::make('act_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('files')
                    ->multiple(),
                Forms\Components\Select::make('order_id')
                    ->relationship('order', 'order_number')
                    ->required(),
                Forms\Components\Select::make('status_id')
                    ->relationship('status', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('act_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('act_number')
                    ->searchable(),
//                Tables\Columns\TextColumn::make('attach_files.file')
//                    ->searchable(),
                Tables\Columns\TextColumn::make('order.order_number')
                    ->numeric()
                    ->label('Order Number')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status.name')
                    ->badge()
                    ->icons([
                        'heroicon-o-check-circle' => 'active',      // Green checkmark for 'active'
                        'heroicon-o-x-circle' => 'inactive',        // Red cross for 'inactive'
                        'heroicon-o-exclamation-circle' => 'suspended', // Warning icon for 'suspended'
                        'heroicon-o-refresh' => 'extended',         // Circular arrow for 'extended'
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
            'index' => Pages\ListActs::route('/'),
            'create' => Pages\CreateAct::route('/create'),
            'edit' => Pages\EditAct::route('/{record}/edit'),
        ];
    }
}
