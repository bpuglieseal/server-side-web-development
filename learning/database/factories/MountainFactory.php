<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mountain>
 */
class MountainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mountain_id' => \Illuminate\Support\Str::uuid(),
            'mountain_name' => $this->faker->word(),
            'mountain_height' => $this->faker->numberBetween(1000, 8848),
            'mountain_belongs_to_range' => $this->faker->boolean(),
            'mountain_first_climb_date' => $this->faker->date(),
            'mountain_continent' => $this->faker->randomElement(['Africa', 'Antarctica', 'Asia', 'Europe', 'North America', 'Oceania', 'South America']),
        ];
    }
}
