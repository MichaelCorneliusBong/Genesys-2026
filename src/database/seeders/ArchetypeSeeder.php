<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Archetype;

class ArchetypeSeeder extends Seeder
{
    public function run(): void
    {
        Archetype::insert([

            [
                'name' => 'Blue-Eyes',
                'slug' => 'blue-eyes',
            ],

            [
                'name' => 'Radiant Typhoon',
                'slug' => 'radiant-typhoon',
            ],

            [
                'name' => 'Voiceless Voice',
                'slug' => 'voiceless-voice',
            ],

            [
                'name' => 'Mimighoul',
                'slug' => 'mimighoul',
            ],

        ]);
    }
}