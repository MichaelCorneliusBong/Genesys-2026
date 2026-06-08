<?php

namespace App\Filament\Admin\Resources\CardResource\Pages;

use App\Filament\Admin\Resources\CardResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;
use Filament\Forms;
use Illuminate\Support\Facades\Artisan;

class ListCards extends ListRecords
{
    protected static string $resource = CardResource::class;

    protected function getHeaderActions(): array
    {
        return [

            Actions\Action::make('syncCard')
                ->label('Sync Card')
                ->icon('heroicon-o-arrow-down-tray')

                ->form([
                    Forms\Components\TextInput::make('card_name')
                        ->required()
                        ->label('Card Name'),
                ])

                ->action(function (array $data) {

                    Artisan::call(
                        'yugioh:sync-card',
                        [
                            'name' => $data['card_name'],
                        ]
                    );

                }),

        ];
    }
}