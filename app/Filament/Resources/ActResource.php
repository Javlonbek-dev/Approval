<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActResource\Pages;
use App\Filament\Resources\ActResource\RelationManagers;
use App\Models\Act;
use App\OrderDetailStatus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
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

//    public static function infolist(Infolist $infolist): Infolist
//    {
//        return $infolist->
//        schema([
//            Section::make('Personal information')
//                ->columns(3)
//                ->schema([
//                    ImageEntry::make('avatar')
//                        ->circular(),
//                    TextEntry::make('file'),
//
//                    Group::make()
//                        ->columnSpan(2)
//                        ->columns(2)
//                        ->schema([
//                            TextEntry::make('name'),
//                            TextEntry::make('phone'),
//                            TextEntry::make('current_locate'),
//                            TextEntry::make('has_spoken')
//                                ->getStateUsing(function ($record) {
//                                    return $record->order_details()->where('status', OrderDetailStatus::APPROVED)->count() > 0 ? 'Previuos Supplier' : 'Has Not Spoken';
//                                })
//                                ->badge()
//                                ->color(function ($state) {
//                                    if ($state === 'Previuos Supplier') {
//                                        return 'success';
//                                    }
//                                    return 'primary';
//                                })
//                        ]),
//                ]),
//
//            Section::make('Other Information')
//                ->schema([
//                    TextEntry::make('current_locate'),
//                    TextEntry::make('qualifications')
//                        ->listWithLineBreaks()
//                        ->bulleted(),
//                ]),
//            Section::make('Uploaded File')
//                ->schema([
//                    TextEntry::make('file')
//                        ->label('Uploaded File')
//                        ->view('filament.components.file-download'), // Custom blade view for download link
//                ])
//        ]);
//
//    }
}
