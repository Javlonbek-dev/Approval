<?php

namespace App\Filament\Resources\IfutResource\Pages;

use App\Filament\Resources\IfutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIfuts extends ListRecords
{
    protected static string $resource = IfutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
