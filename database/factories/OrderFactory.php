<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $company_id = rand(1, 10);

        $store_id   = Store::where('company_id', $company_id)->inRandomOrder()->first()->id;


        $customer_id = Customer::where('company_id', $company_id)->inRandomOrder()->first()->id;

        return [
            'company_id' => $company_id,
            'store_id'   => $store_id,
            'customer_id' => $customer_id,
            'total_price' => 0,
            'created_by' => User::where('store_id', $store_id)->inRandomOrder()->first()->id,
        ];
    }
}
