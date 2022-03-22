<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Favorite>
 */
class FavoriteFactory extends Factory
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
            'image' => $this->faker->url(),
            'user_id' => User::factory()->create()->id
        ];
    }
}
