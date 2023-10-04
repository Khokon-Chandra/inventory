<?php

namespace Database\Factories;

use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Store::class;
    
    public function definition(): array
    {
        return [
            'name' => $this->faker->words,
            'description' => $this->faker->sentence,
        ];
    }
}