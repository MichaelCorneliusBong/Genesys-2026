<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DeckResource\Pages;
use App\Filament\Admin\Resources\DeckResource\RelationManagers;
use App\Models\Deck;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class DeckResource extends Resource
{
    protected static ?string $model = Deck::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    protected static ?string $navigationGroup = 'Genesys';

    protected static ?int $navigationSort = 3;

    protected static ?string $modelLabel = 'Deck';

    protected static ?string $pluralModelLabel = 'Decks';

    public static function form(Form $form): Form
    {
    return $form
        ->schema([
            TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) =>
                    $set('slug', str($state)->slug())
                ),

            TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true),

            Select::make('difficulty')
                ->options([
                    'beginner' => 'Beginner',
                    'intermediate' => 'Intermediate',
                    'advanced' => 'Advanced',
                ])
                ->required(),

            Select::make('archetype_id')
                ->relationship(
                    'archetype',
                    'name'
                )
                ->searchable()
                ->required(),

            Toggle::make('is_active')
                ->default(true),

            RichEditor::make('description')
                ->columnSpanFull(),

            Forms\Components\TextInput::make('author')
                ->label('Author'),

            Forms\Components\TextInput::make('source')
                ->label('Source'),

            Forms\Components\TextInput::make('tournament_name')
                ->label('Tournament'),

            Forms\Components\TextInput::make('placement')
                ->label('Placement'),

            Forms\Components\DatePicker::make('event_date')
                ->label('Event Date'),
        ])
        ->columns(2);
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

            TextColumn::make('author')
                ->searchable(),

            TextColumn::make('tournament_name')
                ->label('Tournament'),

            TextColumn::make('placement'),

            TextColumn::make('difficulty')
                ->badge()
                ->sortable(),

            IconColumn::make('is_active')
                ->boolean(),

            TextColumn::make('created_at')
                ->dateTime('d M Y')
                ->sortable(),
        ])
        ->filters([
            //
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
            RelationManagers\CardsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDecks::route('/'),
            'create' => Pages\CreateDeck::route('/create'),
            'edit' => Pages\EditDeck::route('/{record}/edit'),
        ];
    }
}
