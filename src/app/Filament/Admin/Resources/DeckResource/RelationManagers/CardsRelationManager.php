<?php

namespace App\Filament\Admin\Resources\DeckResource\RelationManagers;

use App\Models\Card;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class CardsRelationManager extends RelationManager
{
    protected static string $relationship = 'cards';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('card_id')
                    ->label('Card')
                    ->options(
                        Card::query()
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('quantity')
                    ->numeric()
                    ->required()
                    ->default(1)
                    ->minValue(1)
                    ->maxValue(3),

                Forms\Components\Select::make('card_role')
                    ->options([
                        'main' => 'Main Deck',
                        'extra' => 'Extra Deck',
                        'side' => 'Side Deck',
                    ])
                    ->required()
                    ->default('main'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\ImageColumn::make('local_image'),

                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('pivot.quantity')
                    ->label('Qty'),

                Tables\Columns\BadgeColumn::make('pivot.card_role')
                    ->colors([
                        'success' => 'main',
                        'warning' => 'extra',
                        'danger' => 'side',
                    ]),
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->form(fn (Tables\Actions\AttachAction $action) => [
                        $action->getRecordSelect(),

                        Forms\Components\TextInput::make('quantity')
                            ->numeric()
                            ->default(1)
                            ->required(),

                        Forms\Components\Select::make('card_role')
                            ->options([
                                'main' => 'Main Deck',
                                'extra' => 'Extra Deck',
                                'side' => 'Side Deck',
                            ])
                            ->required(),
                    ]),
            ])
            ->actions([
                Tables\Actions\DetachAction::make(),
            ]);
    }
}