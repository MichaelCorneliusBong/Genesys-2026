<?php

namespace App\Filament\Admin\Resources\DeckResource\Pages;

use App\Filament\Admin\Resources\DeckResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDeck extends CreateRecord
{
    protected static string $resource = DeckResource::class;
}
