<?php

namespace App\Filament\Resources\ResolutionResource\Pages;

use App\Filament\Resources\ResolutionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResolution extends EditRecord
{
    protected static string $resource = ResolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
