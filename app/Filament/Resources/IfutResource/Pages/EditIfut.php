<?php

namespace App\Filament\Resources\IfutResource\Pages;

use App\Filament\Resources\IfutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIfut extends EditRecord
{
    protected static string $resource = IfutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
