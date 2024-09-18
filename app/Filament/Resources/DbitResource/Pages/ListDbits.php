<?php

namespace App\Filament\Resources\DbitResource\Pages;

use App\Filament\Resources\DbitResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDbits extends ListRecords
{
    protected static string $resource = DbitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
