<?php

namespace App\Filament\Resources\ConclusionResource\Pages;

use App\Filament\Resources\ConclusionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateConclusion extends CreateRecord
{
    protected static string $resource = ConclusionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        return $data;
    }
}
