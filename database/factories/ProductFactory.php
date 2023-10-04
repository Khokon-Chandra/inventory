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
            'category_id' => rand(1,100),
            'name' => $this->faker->sentence(),
            'unit' => 'pice',
            'price' => rand(1000,9999),
            'description' => $this->faker->paragraph(3),
            'created_by' => 1, 
        ];
    }
}