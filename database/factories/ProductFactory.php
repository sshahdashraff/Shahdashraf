<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'name'=>fake()->name(),
            'price'=>fake()->numberBetween(100,1000),
            // 'availability' => $this->faker->randomElement(['available', 'unavailable']),
            // id -> table(category)
            'availability' => fake()->randomElement(['available', 'unavailable']),

            'category_id'=>Category::inRandomOrder()->first()->id
        ];
    }
}