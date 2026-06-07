<?php

namespace App\Console\Commands;

use App\Models\Card;
use App\Services\YgoProDeckService;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SyncYgoCard extends Command
{
    protected $signature = 'yugioh:sync-card {name}';

    protected $description = 'Sync card from YGOPRODeck';

    public function handle(
        YgoProDeckService $service
    ): int {
        $name = $this->argument('name');

        $data = $service->searchCard($name);

        if (! isset($data['data'][0])) {
            $this->error('Card not found.');

            return self::FAILURE;
        }

        $card = $data['data'][0];

        $genesysPoints =
        $card['misc_info'][0]['genesys_points']
        ?? 0;

       $imageUrl = $card['card_images'][0]['image_url'] ?? null;

    $localImage = null;

    if ($imageUrl) {
        $localImage = $service->downloadImage(
            $imageUrl,
            $card['name']
        );
    }

    Card::updateOrCreate(
        [
            'ygoprodeck_id' => $card['id'],
        ],
        [
            'name' => $card['name'],
            'slug' => Str::slug($card['name']),
            'image_url' => $imageUrl,
            'local_image' => $localImage,
            'type' => $card['type'] ?? null,
            'attribute' => $card['attribute'] ?? null,
            'genesys_points' => $genesysPoints,
            'raw_data' => $card,
            'last_synced_at' => now(),
        ]
    );

            $this->info("{$card['name']} synced.");

            return self::SUCCESS;
    }
}