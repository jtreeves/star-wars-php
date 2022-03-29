<?php

namespace App\Http\Requests\Services;

use Illuminate\Support\Facades\Http;

class ImageService
{
    /**
     * The URL to use for the API request.
     *
     * @var string
     */
    private $inputUrl;
    
    /**
     * The URL for the image returned by the API.
     *
     * @var string
     */
    private $outputUrl;

    /**
     * Set input URL for API call by using character.
     *
     * @param string $character
     * @return void
     */
    public function setInputUrl($character)
    {
        $lowerCharacter = strtolower($character);
        $dashedCharacter = str_replace(' ', '-', $lowerCharacter);
        $finalCharacter = str_replace('.', '', $dashedCharacter);
        $base = 'https://api.giphy.com/v1/gifs/random?';
        $key = env('GIPHY_API_KEY');
        $full = "{$base}username=starwars&tag={$finalCharacter}&api_key={$key}";

        $this->inputUrl = $full;
    }
    
    /**
     * Set output to URL of image returned from API.
     *
     * @param string $source
     * @return void
     */
    public function setOutputUrl($source)
    {
        $response = Http::get($source);
        $json = $response->json();
        $data = $json['data'];
        $images = $data['images'];
        $original = $images['original'];
        $url = $original['url'];

        $this->outputUrl = $url;
    }

    /**
     * Retrieve URL image returned from API.
     *
     * @param string $character
     * @return string
     */
    public function getImage($character)
    {
        $this->setInputUrl($character);
        $this->setOutputUrl($this->inputUrl);

        return $this->outputUrl;
    }
}
