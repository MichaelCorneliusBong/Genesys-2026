<?php

namespace App\Console\Commands;

use App\Models\Card;
use App\Services\YgoProDeckService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SyncYgoCard extends Command
{
    protected $signature =
        'yugioh:sync-card {name} {--force}';

    protected $description =
        'Sync card from YGOPRODeck';

    public function handle(
        YgoProDeckService $service
    ): int {

        $name = $this->argument('name');

        $existingCard = Card::query()
            ->whereRaw(
                'LOWER(name) = ?',
                [strtolower($name)]
            )
            ->first();


        if (
            $existingCard
            && ! $this->option('force')
        ) {

            if ($existingCard->hasLocalImage()) {

                $this->warn(
                    "{$name} already exists. SKIPPED."
                );

                return self::SUCCESS;
            }

            $this->warn(
                "{$name} image missing. Repairing..."
            );
        }


        $data = $service->searchCard($name);

        if (! isset($data['data'][0])) {

            $this->error('Card not found.');

            return self::FAILURE;
        }

        $card = $data['data'][0];

        $genesysPoints =
            $card['misc_info'][0]['genesys_points']
            ?? 0;

        $imageUrl =
            $card['card_images'][0]['image_url']
            ?? null;

        $filename =
            Str::slug($card['name']) . '.jpg';

        $existingImagePath =
            "cards/{$filename}";

        $localImage = null;

        if (
            Storage::disk('public')
                ->exists($existingImagePath)
            && ! $this->option('force')
        ) {

            $localImage = $existingImagePath;

            $this->warn(
                'Using existing image.'
            );

        } elseif ($imageUrl) {

            $localImage =
                $service->downloadImage(
                    $imageUrl,
                    $card['name']
                );

            $this->warn(
                'Downloaded image.'
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

        $this->info(
            "{$card['name']} synced."
        );

        return self::SUCCESS;
    }
}