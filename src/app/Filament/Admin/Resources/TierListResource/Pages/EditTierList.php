<?php

namespace App\Filament\Admin\Resources\TierListResource\Pages;

use App\Filament\Admin\Resources\TierListResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTierList extends EditRecord
{
    protected static string $resource = TierListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
