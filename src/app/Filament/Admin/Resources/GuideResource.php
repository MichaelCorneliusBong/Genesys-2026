<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\GuideResource\Pages;
use App\Filament\Admin\Resources\GuideResource\RelationManagers;
use App\Models\Guide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Deck;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class GuideResource extends Resource
{
    protected static ?string $model = Guide::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Genesys';

    protected static ?int $navigationSort = 4;

    protected static ?string $modelLabel = 'Guide';

    protected static ?string $pluralModelLabel = 'Guides';

    public static function form(Form $form): Form
    {
    return $form
        ->schema([
            Select::make('archetype_id')
                ->relationship(
                    'archetype',
                    'name'
                )
                ->searchable()
                ->required(),

            TextInput::make('title')
                ->required()
                ->maxLength(255),

            TextInput::make('sort_order')
                ->numeric()
                ->default(0)
                ->required(),

            RichEditor::make('content')
                ->required()
                ->columnSpanFull(),
        ])
        ->columns(2);
    }

    public static function table(Table $table): Table
    {
    return $table
        ->columns([
            TextColumn::make('archetype.name')
                ->label('Archetype')
                ->searchable()
                ->sortable(),

            TextColumn::make('title')
                ->searchable()
                ->sortable(),

            TextColumn::make('sort_order')
                ->sortable(),

            TextColumn::make('created_at')
                ->dateTime('d M Y')
                ->sortable(),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('archetype_id')
                ->relationship('archetype', 'name'),
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
            'index' => Pages\ListGuides::route('/'),
            'create' => Pages\CreateGuide::route('/create'),
            'edit' => Pages\EditGuide::route('/{record}/edit'),
        ];
    }
}
