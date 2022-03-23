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
        return [
            'quote' => $this->faker->sentence(10, true),
            'character' => $this->faker->name(),
            'image' => $this->faker->url()
        ];
    }
}
