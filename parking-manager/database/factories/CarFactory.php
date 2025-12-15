<?php

namespace Database\Factories;

use Dotenv\Util\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => (string) \Illuminate\Support\Str::uuid(),
            'plate' => $this->faker->bothify('???-####'),
            'brand' => $this->faker->company(),
            'model' => $this->faker->word(),
        ];
    }
}
