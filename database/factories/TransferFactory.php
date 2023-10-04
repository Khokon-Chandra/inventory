<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transfer>
 */
class TransferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $company = rand(1,10);

        $from_store_id = Store::where('company_id', $company)->inRandomOrder()->first()->id;

        $to_store_id = Store::where('company_id', $company)->where('id','!=',$from_store_id)->inRandomOrder()->first()->id;


        return [
            'company_id'    => $company,
            'from_store'    => $from_store_id,
            'to_store'      => $to_store_id,
            'status'        => 'pending',
        ];
        
    }
}