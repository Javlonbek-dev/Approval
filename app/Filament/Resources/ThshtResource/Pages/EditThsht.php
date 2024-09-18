<?php

namespace App\Filament\Resources\ThshtResource\Pages;

use App\Filament\Resources\ThshtResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditThsht extends EditRecord
{
    protected static string $resource = ThshtResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
