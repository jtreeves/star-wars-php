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
    private $fullText;
    
    /**
     * An array with a quote key and a character key.
     *
     * @var array<string,string>
     */
    private $quoteArray;

    /**
     * Set text to value returned from API call.
     *
     * @return void
     */
    public function setFullText()
    {
        $url = 'http://swquotesapi.digitaljedi.dk/api/SWQuote/RandomStarWarsQuote';
        $response = Http::withoutVerifying()->get($url);
        $json = $response->json();
        $content = $json['content'];

        $this->fullText = $content;
    }

    /**
     * Use input to create array with separate keys for quote and character.
     *
     * @param string $input
     * @return void
     */
    public function setQuoteArray($input)
    {
        $sections = explode(' — ', $input);

        if (count($sections) != 2) {
            $this->getQuoteCharacter();
        } else {
            $quote = $sections[0];
            $character = $sections[1];
            $package = [
                'quote' => $quote,
                'character' => $character,
            ];
    
            $this->quoteArray = $package;
        }
    }

    /**
     * Return random quote and character.
     *
     * @return array<string,string>
     */
    public function getQuoteCharacter()
    {
        $this->setFullText();
        $this->setQuoteArray($this->fullText);

        return $this->quoteArray;
    }
}
