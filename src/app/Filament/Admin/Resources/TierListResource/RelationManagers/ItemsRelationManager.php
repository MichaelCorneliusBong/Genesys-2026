<?php

namespace App\Filament\Admin\Resources\TierListResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = 'Tier List Items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('archetype_id')
                    ->relationship('archetype', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\Select::make('tier')
                    ->options([
                        'S' => 'S Tier',
                        'A' => 'A Tier',
                        'B' => 'B Tier',
                        'C' => 'C Tier',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('position')
                    ->numeric()
                    ->default(1)
                    ->required(),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('archetype.name')

            ->columns([

                Tables\Columns\TextColumn::make('archetype.name')
                    ->label('Archetype')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('tier')
                    ->colors([
                        'danger' => 'S',
                        'warning' => 'A',
                        'success' => 'B',
                        'gray' => 'C',
                    ]),

                Tables\Columns\TextColumn::make('position')
                    ->sortable(),

            ])

            ->filters([

            ])

            ->headerActions([

                Tables\Actions\CreateAction::make(),

            ])

            ->actions([

                Tables\Actions\EditAction::make(),

                Tables\Actions\DeleteAction::make(),

            ])

            ->bulkActions([

                Tables\Actions\BulkActionGroup::make([

                    Tables\Actions\DeleteBulkAction::make(),

                ]),

            ]);
    }
}