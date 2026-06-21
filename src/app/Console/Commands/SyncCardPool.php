<?php

namespace App\Console\Commands;

use App\Genesys\CardPool;
use App\Models\Card;
use App\Services\YgoProDeckService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SyncCardPool extends Command
{
    protected $signature =
        'genesys:sync-card-pool {--force}';

    protected $description =
        'Sync all cards from Card Pool';

    public function handle(
        YgoProDeckService $service
    ): int {

        $cards = CardPool::cards();

        foreach ($cards as $cardName) {

            $existingCard = Card::query()
                ->whereRaw(
                    'LOWER(name) = ?',
                    [strtolower($cardName)]
                )
                ->first();

            if (
                $existingCard
                && ! $this->option('force')
            ) {

                if (
                    $existingCard->hasLocalImage()
                ) {

                    $this->warn(
                        "SKIP - {$cardName}"
                    );

                    continue;
                }

                $this->warn(
                    "REPAIR IMAGE - {$cardName}"
                );
            }

            $data = $service->searchCard(
                $cardName
            );

            if (
                ! isset($data['data'][0])
            ) {

                $this->error(
                    "NOT FOUND - {$cardName}"
                );

                continue;
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

                $localImage =
                    $existingImagePath;

                $this->warn(
                    "Using existing image."
                );

            } elseif ($imageUrl) {

                $localImage =
                    $service->downloadImage(
                        $imageUrl,
                        $card['name']
                    );

                $this->warn(
                    "Downloaded image."
                );
            }

            Card::updateOrCreate(
                [
                    'ygoprodeck_id' => $card['id'],
                ],
                [
                    'name' => $card['name'],
                    'slug' => Str::slug(
                        $card['name']
                    ),
                    'image_url' => $imageUrl,
                    'local_image' => $localImage,
                    'type' => $card['type']
                        ?? null,
                    'attribute' =>
                        $card['attribute']
                        ?? null,
                    'genesys_points' =>
                        $genesysPoints,
                    'raw_data' => $card,
                    'last_synced_at' => now(),
                ]
            );

            $this->info(
                "SYNCED - {$card['name']}"
            );
        }

        return self::SUCCESS;
    }
}