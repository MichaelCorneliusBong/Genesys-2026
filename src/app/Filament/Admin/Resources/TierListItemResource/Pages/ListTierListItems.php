<?php

namespace App\Filament\Admin\Resources\TierListItemResource\Pages;

use App\Filament\Admin\Resources\TierListItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTierListItems extends ListRecords
{
    protected static string $resource = TierListItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
