<?php

namespace Database\Factories;

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
            'sku' => 'SKU' . $this->faker->unique()->numberBetween(1, 100),
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(10000, 100000),
        ];
    }
}
