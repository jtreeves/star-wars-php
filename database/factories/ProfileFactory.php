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
        $avatars = array_keys(config('constants.avatars'));
        $colors = array_keys(config('constants.colors'));
        $random = rand(0, 9);
        $randomAvatar = $avatars[$random];
        $randomColor = $colors[$random];

        return [
            'user_id' => User::factory()->create()->id,
            'username' => $this->faker->userName(),
            'bio' => $this->faker->sentence(10, true),
            'location' => $this->faker->city(),
            'avatar' => $randomAvatar,
            'color' => $randomColor,
            'movie' => $this->faker->sentence(3, true)
        ];
    }
}
