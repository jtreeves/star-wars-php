<?php

namespace App\Http\Requests\Services;

use Illuminate\Support\Facades\Http;

class QuoteService
{
    // The full text, including the quote and the character
    private string $fullText;
    
    // An array with a quote key and a character key
    private array $quoteArray;

    // Set text to value returned from API call
    public function setFullText(): void
    {
        $url = 'http://swquotesapi.digitaljedi.dk/api/SWQuote/RandomStarWarsQuote';
        $response = Http::withoutVerifying()->get($url);
        $json = $response->json();
        $content = $json['content'];

        $this->fullText = $content;
    }

    // Use input to create array with separate keys for quote and character
    public function setQuoteArray(string $input): void
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

    // Return random quote and character
    public function getQuoteCharacter(): array
    {
        $this->setFullText();
        $this->setQuoteArray($this->fullText);

        return $this->quoteArray;
    }
}
