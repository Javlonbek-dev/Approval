<?php

namespace App\Filament\Resources\CalculateResource\Pages;

use App\Filament\Resources\CalculateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCalculate extends EditRecord
{
    protected static string $resource = CalculateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
