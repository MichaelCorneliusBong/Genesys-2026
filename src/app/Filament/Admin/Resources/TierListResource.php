<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TierListResource\Pages;
use App\Filament\Admin\Resources\TierListResource\RelationManagers\ItemsRelationManager;
use App\Models\TierList;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TierListResource extends Resource
{
    protected static ?string $model = TierList::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Genesys';

    protected static ?int $navigationSort = 6;

    protected static ?string $modelLabel = 'Tier List';

    protected static ?string $pluralModelLabel = 'Tier Lists';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->rows(4)
                    ->columnSpanFull(),

                Forms\Components\Toggle::make('is_active')
                    ->label('Active Tier List')
                    ->default(false),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable(),

            ])
            ->filters([

            ])
            ->actions([

                Tables\Actions\EditAction::make(),

            ])
            ->bulkActions([

                Tables\Actions\BulkActionGroup::make([

                    Tables\Actions\DeleteBulkAction::make(),

                ]),

            ]);
    }

    public static function getRelations(): array
    {
        return [

            ItemsRelationManager::class,

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTierLists::route('/'),
            'create' => Pages\CreateTierList::route('/create'),
            'edit' => Pages\EditTierList::route('/{record}/edit'),
        ];
    }
}