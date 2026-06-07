<?php

namespace App\Filament\Admin\Resources\TierListResource\Pages;

use App\Filament\Admin\Resources\TierListResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTierLists extends ListRecords
{
    protected static string $resource = TierListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
