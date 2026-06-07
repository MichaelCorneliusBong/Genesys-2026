<?php

namespace App\Filament\Admin\Resources\DeckResource\Pages;

use App\Filament\Admin\Resources\DeckResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDeck extends EditRecord
{
    protected static string $resource = DeckResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
