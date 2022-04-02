<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $avatars = config('constants.avatars');
        $colors = config('constants.colors');
        $names = array_keys($avatars);
        $colorWords = array_keys($colors);
        $random = rand(0, 9);
        $image = $avatars[$names[$random]];
        $hex = $colors[$colorWords[$random]];

        return [
            'user_id' => User::factory()->create()->id,
            'username' => $this->faker->userName(),
            'bio' => $this->faker->sentence(10, true),
            'location' => $this->faker->city(),
            'avatar' => $image,
            'color' => $hex,
            'movie' => $this->faker->sentence(3, true)
        ];
    }
}
