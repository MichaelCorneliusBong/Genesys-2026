<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Deck;
use Illuminate\Database\Seeder;

class DeckCardSeeder extends Seeder
{
    public function run(): void
    {
        $deck = Deck::where(
            'slug',
            'blue-eyes-josue-portillo'
        )->first();

        if (! $deck) {
            return;
        }

        $cards = [

            // MAIN

            ['Blue-Eyes White Dragon', 3, 'main'],
            ['Blue-Eyes Alternative White Dragon', 2, 'main'],
            ['Sage with Eyes of Blue', 3, 'main'],
            ['The White Stone of Ancients', 3, 'main'],
            ['Dictator of D.', 2, 'main'],
            ['Effect Veiler', 3, 'main'],
            ['Ash Blossom & Joyous Spring', 3, 'main'],

            ['Trade-In', 3, 'main'],
            ['The Melody of Awakening Dragon', 3, 'main'],
            ['Ultimate Fusion', 2, 'main'],
            ['Called by the Grave', 1, 'main'],
            ['Crossout Designator', 1, 'main'],

            ['Infinite Impermanence', 3, 'main'],

            // EXTRA

            ['Blue-Eyes Spirit Dragon', 2, 'extra'],
            ['Azure-Eyes Silver Dragon', 2, 'extra'],
            ['Blue-Eyes Tyrant Dragon', 1, 'extra'],
            ['Hieratic Seal of the Heavenly Spheres', 1, 'extra'],

            // SIDE

            ['Nibiru, the Primal Being', 3, 'side'],
        ];

        foreach ($cards as [
            $cardName,
            $quantity,
            $role
        ]) {

            $card = Card::where(
                'name',
                $cardName
            )->first();

            if (! $card) {

                $this->command?->warn(
                    "Card not found: {$cardName}"
                );

                continue;
            }

            $deck->cards()
                ->syncWithoutDetaching([
                    $card->id => [
                        'quantity' => $quantity,
                        'card_role' => $role,
                    ]
                ]);
        }
    }
}