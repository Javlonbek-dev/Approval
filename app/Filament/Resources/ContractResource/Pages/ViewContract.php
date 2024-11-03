<?php

namespace App\Filament\Resources\ContractResource\Pages;

use App\Filament\Resources\ContractResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewContract extends ViewRecord
{
    protected static string $resource = ContractResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('download_contract')
                ->label('Download Contract')
                ->url(fn ($record): string => route('contract-file', ['id' => $record->id])),
            Actions\EditAction::make('edit')
        ];
    }
}
