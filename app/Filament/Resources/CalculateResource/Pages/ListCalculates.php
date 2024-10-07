<?php

namespace App\Filament\Resources\CalculateResource\Pages;

use App\Filament\Resources\CalculateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCalculates extends ListRecords
{
    protected static string $resource = CalculateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
