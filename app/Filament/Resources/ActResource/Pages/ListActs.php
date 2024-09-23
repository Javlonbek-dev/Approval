<?php

namespace App\Filament\Resources\ActResource\Pages;

use App\Filament\Resources\ActResource;
use App\OrderDetailStatus;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListActs extends ListRecords
{
    protected static string $resource = ActResource::class;

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
            'approved' => Tab::make('Approved')
                ->modifyQueryUsing(function ($query) {
                    return $query->where('status', );
                }),
            'rejected' => Tab::make('Rejected')
                ->modifyQueryUsing(function ($query) {
                    return $query->where('status', );
                }),
            'submitted' => Tab::make('Submitted')
                ->modifyQueryUsing(function ($query) {
                    return $query->where('status', );
                })
        ];
    }

}
