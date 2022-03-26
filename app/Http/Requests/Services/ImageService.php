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
    private $inputUrl = 'Star Wars';
    
    /**
     * The URL for the image returned by the API.
     *
     * @var string
     */
    private $outputUrl = '';

    /**
     * Set input URL for API call by using character.
     *
     * @param string $character
     * @return void
     */
    public function setInputUrl($character)
    {
        $base = 'https://api.giphy.com/v1/gifs/random?';
        $key = env('GIPHY_API_KEY');
        $full = "{$base}username=starwars&tag={$character}&api_key={$key}";

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
        $data = $response->json()->data;
        $image = $data->images->original->url;

        $this->outputUrl = $image;
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
