<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ArchetypeResource\Pages;
use App\Filament\Admin\Resources\ArchetypeResource\RelationManagers;
use App\Models\Archetype;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class ArchetypeResource extends Resource
{
    protected static ?string $model = Archetype::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationGroup = 'Genesys';

    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Archetype';

    protected static ?string $pluralModelLabel = 'Archetypes';

    public static function form(Form $form): Form
    {
    return $form
        ->schema([

            Forms\Components\TextInput::make('name')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(
                    fn ($state, callable $set)
                        => $set('slug', str($state)->slug())
                ),

            Forms\Components\TextInput::make('slug')
                ->required(),

            Forms\Components\FileUpload::make('thumbnail')
                ->image()
                ->directory('archetypes'),

            Forms\Components\Textarea::make('description')
                ->columnSpanFull(),

        ]);
    }

    public static function table(Table $table): Table
    {
    return $table
        ->columns([

            ImageColumn::make('thumbnail')
                ->square(),

            TextColumn::make('name')
                ->searchable()
                ->sortable(),

            TextColumn::make('slug')
                ->searchable(),

            TextColumn::make('decks_count')
                ->counts('decks')
                ->label('Decks'),

            TextColumn::make('guides_count')
                ->counts('guides')
                ->label('Guides'),

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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArchetypes::route('/'),
            'create' => Pages\CreateArchetype::route('/create'),
            'edit' => Pages\EditArchetype::route('/{record}/edit'),
        ];
    }
}
