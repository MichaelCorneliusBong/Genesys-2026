<?php

namespace App\Filament\Admin\Resources\QuizHistoryResource\Pages;

use App\Filament\Admin\Resources\QuizHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuizHistory extends EditRecord
{
    protected static string $resource = QuizHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
