<?php

namespace App\Filament\Admin\Resources\ArchetypeResource\Pages;

use App\Filament\Admin\Resources\ArchetypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArchetypes extends ListRecords
{
    protected static string $resource = ArchetypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
