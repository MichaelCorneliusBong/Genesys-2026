<?php

namespace App\Filament\Admin\Resources\BookmarkResource\Pages;

use App\Filament\Admin\Resources\BookmarkResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBookmark extends CreateRecord
{
    protected static string $resource = BookmarkResource::class;
}
