<?php

namespace App\Filament\Resources\ContractResource\Pages;

use App\Filament\Resources\ContractResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListContracts extends ListRecords
{
    protected static string $resource = ContractResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All Orders Details'),

            'active' => Tab::make('Active')
                ->modifyQueryUsing(function ($query) {
                    return $query->whereHas('status', function ($query) {
                        $query->where('name', 'active');
                    });
                }),

            'inactive' => Tab::make('Inactive')
                ->modifyQueryUsing(function ($query) {
                    return $query->whereHas('status', function ($query) {
                        $query->where('name', 'inactive');
                    });
                }),

            'suspended' => Tab::make('Suspended')
                ->modifyQueryUsing(function ($query) {
                    return $query->whereHas('status', function ($query) {
                        $query->where('name', 'suspended');
                    });
                }),

            'extended' => Tab::make('Extended')
                ->modifyQueryUsing(function ($query) {
                    return $query->whereHas('status', function ($query) {
                        $query->where('name', 'extended');
                    });
                }),
        ];
    }

}
