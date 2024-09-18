<?php

namespace App\Filament\Resources\DbitResource\Pages;

use App\Filament\Resources\DbitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDbit extends EditRecord
{
    protected static string $resource = DbitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
