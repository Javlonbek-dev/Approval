<?php

namespace App\Filament\Resources\ThshtResource\Pages;

use App\Filament\Resources\ThshtResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListThshts extends ListRecords
{
    protected static string $resource = ThshtResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
