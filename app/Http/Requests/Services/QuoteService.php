<?php

namespace App\Http\Requests\Services;

use Illuminate\Support\Facades\Http;

class QuoteService
{
    // The full text, including the quote and the character
    private string $fullText;
    
    // An array with a quote key and a character key
    private array $quoteArray;

    // An array of all possible breakpoints to test
    private array $breakPoints = [
        ' — ',
        ' -- ',
        ' - ',
        ' ? ',
    ];

    // Remove parenthetical title from end of quote
    private function deleteTitle(): void
    {
        $quote = $this->quoteArray['quote'];
        $title = '(A New Hope)';

        if (str_contains($quote, $title)) {
            $position = strpos($quote, $title);
            $paredQuote = substr($quote, 0, $position - 2);

            $this->quoteArray['quote'] = $paredQuote;
        }
    }

    // Set text to value returned from API call
    private function setFullText(): void
    {
        $url = 'http://swquotesapi.digitaljedi.dk/api/SWQuote/RandomStarWarsQuote';
        $response = Http::withoutVerifying()->get($url);
        $json = $response->json();
        $content = $json['content'];

        $this->fullText = $content;
    }

    // Use input to create array with separate keys for quote and character
    private function setQuoteArray(string $input, int $index): void
    {
        $this->quoteArray = explode($this->breakPoints[$index], $input);

        if (count($this->quoteArray) == 2) {
            $this->quoteArray = [
                'quote' => $this->quoteArray[0],
                'character' => $this->quoteArray[1],
            ];
            $this->deleteTitle();
        } else {
            if ($index == 3) {
                $this->getQuoteCharacter();
            } else {
                $this->setQuoteArray($input, $index + 1);
            }
        }
    }

    // Return random quote and character
    public function getQuoteCharacter(): array
    {
        $this->setFullText();
        $this->setQuoteArray($this->fullText, 0);

        return $this->quoteArray;
    }
}
