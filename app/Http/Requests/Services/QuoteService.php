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
    private function setFullText(): void
    {
        $url = 'http://swquotesapi.digitaljedi.dk/api/SWQuote/RandomStarWarsQuote';
        $response = Http::withoutVerifying()->get($url);
        $json = $response->json();
        $content = $json['content'];

        $this->fullText = $content;
    }

    // Use input to create array with separate keys for quote and character
    private function setQuoteArray(string $input): void
    {
        $sectionsDash = explode(' — ', $input);
        $sectionsDoubleHypen = explode(' -- ', $input);
        $sectionsHypen = explode(' - ', $input);
        $sectionsFlushDash = explode('—', $input);
        $sectionsFlushDoubleHypen = explode('--', $input);
        $sectionsFlushHypen = explode('-', $input);

        if (count($sectionsDash) == 2) {
            $sections = $sectionsDash;
        } else if (count($sectionsDoubleHypen) == 2) {
            $sections = $sectionsDoubleHypen;
        } else if (count($sectionsHypen) == 2) {
            $sections = $sectionsHypen;
        } else if (count($sectionsFlushDash) == 2) {
            $sections = $sectionsFlushDash;
        } else if (count($sectionsFlushDoubleHypen) == 2) {
            $sections = $sectionsFlushDoubleHypen;
        } else if (count($sectionsFlushHypen) == 2) {
            $sections = $sectionsFlushHypen;
        } else {
            $sections = [];
        }

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
