<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mashup>
 */
class MashupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $avatars = config('constants.avatars');
        $names = array_keys($avatars);
        $random = rand(0, 9);
        $character = $names[$random];
        $image = $avatars[$character];

        return [
            'quote' => $this->faker->sentence(10, true),
            'character' => $character,
            'image' => $image,
        ];
    }
}
