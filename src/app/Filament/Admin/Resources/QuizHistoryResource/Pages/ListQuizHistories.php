<?php

namespace App\Filament\Admin\Resources\QuizHistoryResource\Pages;

use App\Filament\Admin\Resources\QuizHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuizHistories extends ListRecords
{
    protected static string $resource = QuizHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
