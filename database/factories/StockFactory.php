<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'store_id' => rand(1,10),
            'product_id' => rand(1, 200),
            'opening_stock' => rand(10, 100),
            'closing_stock' => rand(10,100),
            'date' => $this->faker->dateTimeThisYear()
        ];
    }
}
