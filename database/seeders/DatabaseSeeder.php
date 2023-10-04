<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\Customer::factory(50)->create();

        $this->call([StoreSeeder::class]);
        
        \App\Models\Category::factory(100)->create();


        \App\Models\User::factory(50)->create();


        \App\Models\User::factory()->create([
            'store_id'     => 1,
            'name'         => 'Test User',
            'email'        => 'admin@admin.com',
            'password'     => bcrypt(12345678),
        ]);

        \App\Models\Product::factory(200)->create();

        \App\Models\Stock::factory(1000)->create();


    }
}