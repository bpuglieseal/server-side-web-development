<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'animal_id' => \Illuminate\Support\Str::uuid(),
            'animal_name' => $this->faker->firstName(),
            'animal_species' => $this->faker->randomElement(['Dog', 'Cat', 'Lion', 'Tiger', 'Bear']),
            'animal_age' => $this->faker->numberBetween(1, 15),
            'animal_type' => $this->faker->randomElement(['Mammal', 'Reptile', 'Bird', 'Fish', 'Amphibian']),
        ];
    }
}
