<?php

namespace App\Filament\Admin\Resources\BookmarkResource\Pages;

use App\Filament\Admin\Resources\BookmarkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBookmark extends EditRecord
{
    protected static string $resource = BookmarkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
