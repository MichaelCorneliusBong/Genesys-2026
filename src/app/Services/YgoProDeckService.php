<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class YgoProDeckService
{
    protected string $baseUrl = 'https://db.ygoprodeck.com/api/v7';

    public function searchCard(string $name): ?array
    {
        $response = Http::get(
            "{$this->baseUrl}/cardinfo.php",
            [
                'name' => $name,
                'format' => 'genesys',
                'misc'   => 'yes',
            ]
        );

        if (! $response->successful()) {
            return null;
        }

        return $response->json();
    }

    public function downloadImage(
    string $imageUrl,
    string $cardName
    ): ?string {
        $response = Http::get($imageUrl);

        if (! $response->successful()) {
            return null;
        }

        $filename = Str::slug($cardName) . '.jpg';

        $path = "cards/{$filename}";

        Storage::disk('public')->put(
            $path,
            $response->body()
        );

        return $path;
    }   
}