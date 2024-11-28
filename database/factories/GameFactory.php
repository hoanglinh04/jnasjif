<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => $this->faker->sentence(3),
            'cover_art' => $this->faker->imageUrl(640, 480, 'games', true),
            'developer' => $this->faker->company,
            'release_year' => $this->faker->year,
            'genre' => $this->faker->word,  
        ];
    }
}
