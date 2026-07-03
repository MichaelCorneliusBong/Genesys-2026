<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        
        $this->call([
        ArchetypeSeeder::class,
        RoleSeeder::class,
        UserSeeder::class,
        DeckSeeder::class,
        ]);

        Artisan::call(
            'genesys:sync-card-pool'
        );

        $this->call([
            DeckCardSeeder::class,
        ]);
    }
}
