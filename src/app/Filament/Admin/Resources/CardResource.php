<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CardResource\Pages;
use App\Filament\Admin\Resources\CardResource\RelationManagers;
use App\Models\Card;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CardResource extends Resource
{
    protected static ?string $model = Card::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Genesys';

    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'Card';

    protected static ?string $pluralModelLabel = 'Cards';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
    return $table
        ->columns([

            Tables\Columns\ImageColumn::make('local_image')
                ->label('Card'),

            Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('type'),

            Tables\Columns\TextColumn::make('attribute'),

            Tables\Columns\TextColumn::make('genesys_points')
                ->badge(),

        ])
        ->actions([
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCards::route('/'),
            'create' => Pages\CreateCard::route('/create'),
            'edit' => Pages\EditCard::route('/{record}/edit'),
        ];
    }
}
