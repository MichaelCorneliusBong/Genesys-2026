<?php

namespace App\Filament\Admin\Resources\TierListItemResource\Pages;

use App\Filament\Admin\Resources\TierListItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTierListItem extends EditRecord
{
    protected static string $resource = TierListItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
