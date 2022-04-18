<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class PointInterestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->company(),
            'latitude' => $this->faker->randomNumber(2, true),
            'longitude' => $this->faker->randomNumber(2, true),
            'opened' => $this->faker->time('H:i'),
            'closed' => $this->faker->time('H:i'),
        ];
    }

    /**
     * Indicate a point interest opened 24hrs
     *
     * @return Factory
     */
    public function everOpen(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'opened' => null,
                'closed' => null,
            ];
        });
    }
}
