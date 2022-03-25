<?php

namespace App\Http\Requests\Services;

use Illuminate\Support\Facades\Http;

class QuoteService
{
    /**
     * The full text, containing both the quote and the character who said it.
     *
     * @var string
     */
    private $text = '';

    /**
     * Set text to value returned from API call.
     *
     * @return void
     */
    public function setText()
    {
        $url = 'http://swquotesapi.digitaljedi.dk/api/SWQuote/RandomStarWarsQuote';
        $response = Http::get($url);
        $data = $response->json()->data;
        $content = $data->content;

        $this->text = $content;
    }

    /**
     * Return random quote and character.
     *
     * @return string
     */
    public function getQuoteCharacter()
    {
        $this->setText();

        $sections = explode(' - ', $text);
        $quote = $sections[0];
        $character = $sections[1];
        $package = [
            'quote' => $quote,
            'character' => $character,
        ];

        return $package;
    }
}
