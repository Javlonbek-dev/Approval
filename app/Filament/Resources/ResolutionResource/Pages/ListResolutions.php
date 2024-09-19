<?php

namespace App\Filament\Resources\ResolutionResource\Pages;

use App\Filament\Resources\ResolutionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResolutions extends ListRecords
{
    protected static string $resource = ResolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
