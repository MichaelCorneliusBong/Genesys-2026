<?php

namespace Database\Seeders;

use App\Models\Deck;
use Illuminate\Database\Seeder;

class DeckSeeder extends Seeder
{
    public function run(): void
    {
        Deck::insert([

            [
                'archetype_id' => 1,
                'name' => 'Blue-Eyes',
                'slug' => 'blue-eyes-josue-portillo',
                'author' => 'Josue Benjamin Hernandez Portillo',
                'source' => 'TCGPlayer',
                'tournament_name' => 'Giant Card Guatemala City',
                'placement' => '2nd Place',
                'event_date' => '2026-04-11',
                'difficulty' => 'beginner',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'archetype_id' => 2,
                'name' => 'Red Dragon Archfiend',
                'slug' => 'rda-xiaoyi-huang',
                'author' => 'Xiaoyi Stanley Huang',
                'source' => 'TCGPlayer',
                'tournament_name' => 'YCS Columbus',
                'placement' => '1st Place',
                'event_date' => '2026-05-24',
                'difficulty' => 'advanced',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'archetype_id' => 3,
                'name' => 'Radiant Typhoon',
                'slug' => 'radiant-typhoon-william-wesley',
                'author' => 'William Conner Wesley',
                'source' => 'TCGPlayer',
                'tournament_name' => 'YCS Columbus',
                'placement' => '2nd Place',
                'event_date' => '2026-05-24',
                'difficulty' => 'advanced',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'archetype_id' => 4,
                'name' => 'Voiceless Voice',
                'slug' => 'voiceless-voice-zackoria',
                'author' => 'Zackoria Isaiah Louis',
                'source' => 'TCGPlayer',
                'tournament_name' => 'YCS Columbus',
                'placement' => 'Top 4',
                'event_date' => '2026-05-24',
                'difficulty' => 'advanced',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}