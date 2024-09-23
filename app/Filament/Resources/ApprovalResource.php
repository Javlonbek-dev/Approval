<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApprovalResource\Pages;
use App\Filament\Resources\ApprovalResource\RelationManagers;
use App\Models\Approval;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApprovalResource extends Resource
{
    protected static ?string $model = Approval::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('register_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('accreditation_date')
                    ->required(),
                Forms\Components\DatePicker::make('validity_date')
                    ->required(),
                Forms\Components\DatePicker::make('reissue_date'),
                Forms\Components\Toggle::make('is_reissued_date')
                    ->required(),
                Forms\Components\TextInput::make('full_name_supervisor')
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_fact_address')
                    ->required(),
                Forms\Components\Toggle::make('phone_ao'),
                Forms\Components\Toggle::make('email_ao'),
                Forms\Components\DatePicker::make('status_date')
                    ->required(),
                Forms\Components\TextInput::make('file_oblast')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_public'),
                Forms\Components\Toggle::make('is_file_oblast'),
                Forms\Components\TextInput::make('area')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('owner_ship_id')
                    ->relationship('ownerShip', 'id')
                    ->required(),
                Forms\Components\Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required(),
                Forms\Components\Select::make('laboratory_id')
                    ->relationship('laboratory', 'name')
                    ->required(),
                Forms\Components\Select::make('direction_id')
                    ->relationship('direction', 'name')
                    ->required(),
                Forms\Components\Select::make('status_id')
                    ->relationship('status', 'name')
                    ->required(),
                Forms\Components\Select::make('approval_company_id')
                    ->relationship('approval_company', 'name')
                    ->required(),
                Forms\Components\TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('updated_by')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('register_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('accreditation_date')
                    ->date('d.m.Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('validation_date')
                    ->date('d.m.Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('reissue_date')
                    ->date('d.m.Y')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_reissued_date')
                    ->boolean(),
                Tables\Columns\TextColumn::make('full_name_supervisor')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_fact_address')
                    ->boolean(),
                Tables\Columns\TextColumn::make('phone_ao'),
                Tables\Columns\TextColumn::make('email_ao'),
                Tables\Columns\TextColumn::make('status_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('file_oblast')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_public')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_file_oblast')
                    ->boolean(),
                Tables\Columns\TextColumn::make('area')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ownerShip.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('laboratory.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('direction.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status.name')
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
            'index' => Pages\ListApprovals::route('/'),
            'create' => Pages\CreateApproval::route('/create'),
            'edit' => Pages\EditApproval::route('/{record}/edit'),
        ];
    }
}
