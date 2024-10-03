<?php

namespace App\Filament\Resources\CompanyResource\Pages;

use App\Filament\Resources\CompanyResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Tables\Actions\LocaleSwitcher;

class CreateCompany extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = CompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            LocaleSwitcher::make()
        ];
    }
}
