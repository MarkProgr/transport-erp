<?php

namespace Database\Factories;

use App\Models\Transport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->firstName,
            'surname' => fake()->lastName,
            'age' => fake()->numerify('%#'),
            'email' => fake()->email,
            'category' => fake()->randomElement(['A', 'B', 'C']),
            'status' => fake()->randomElement(['Inactive']),
            'transport_id' => Transport::factory()->create()->id,
        ];
    }
}
