<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Transfer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransferItem>
 */
class TransferItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $transfer_id = rand(1,500);

        $company_id = Transfer::find($transfer_id)->company_id;

        $product_id = Product::where('company_id',$company_id)->inRandomOrder()->first()->id;

        return [
            'transfer_id' => $transfer_id,
            'product_id'  => $product_id,
            'quantity'    => rand(10,50),
        ];
    }
}