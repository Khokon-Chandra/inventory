<?php

namespace Database\Factories;

use App\Models\Store;
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
        $company_id = rand(1,10);

        $store_id  = Store::where('company_id',$company_id)->inRandomOrder()->first()->id;

        return [
            'company_id'    => $company_id,
            'store_id'      => $store_id,
            'product_id'    => rand(1, 200),
            'opening_stock' => rand(10, 100),
            'closing_stock' => rand(10,100),
            'date'          => $this->faker->dateTimeThisYear()
        ];
    }
}
