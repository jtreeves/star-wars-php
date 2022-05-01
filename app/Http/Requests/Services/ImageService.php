<?php

namespace App\Http\Requests\Services;

use Illuminate\Support\Facades\Http;

class ImageService
{
    // The URL to use for the API request
    private string $inputUrl;
    
    // The URL for the image returned by the API
    private string $outputUrl;

    // Set input URL for API call by using character
    private function setInputUrl(string $character): void
    {
        $lowerCharacter = strtolower($character);
        $dashedCharacter = str_replace(' ', '-', $lowerCharacter);
        $finalCharacter = str_replace('.', '', $dashedCharacter);
        $base = 'https://api.giphy.com/v1/gifs/random?';
        $key = env('GIPHY_API_KEY');
        $full = "{$base}username=starwars&tag={$finalCharacter}&api_key={$key}";

        $this->inputUrl = $full;
    }
    
    // Set output to URL of image returned from API
    private function setOutputUrl(string $source): void
    {
        $response = Http::get($source);
        $json = $response->json();
        $data = $json['data'];
        $images = $data['images'];
        $original = $images['original'];
        $url = $original['url'];

        if ($url && str_starts_with($url, 'https://media')) {
            $this->outputUrl = $url;
        } else {
            $this->setOutputUrl($source);
        }
    }

    // Retrieve URL image returned from API
    public function getImage(string $character): string
    {
        $this->setInputUrl($character);
        $this->setOutputUrl($this->inputUrl);

        return $this->outputUrl;
    }
}
