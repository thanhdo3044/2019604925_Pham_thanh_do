<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'=>fake()->numberBetween(1, 100),
            'name'=>fake()->text(20),
            'price'=>fake()->numberBetween(100, 1000000),
            'description'=>fake()->text(),
            'slug'=>fake()->text(),
            'is_active'=>fake()->boolean,
        ];
    }
}
