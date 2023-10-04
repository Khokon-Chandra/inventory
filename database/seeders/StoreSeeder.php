<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::create([
            'name' => 'Uttara Store',
        ]);

        Store::create([
            'name' => 'Rampura Store',
        ]);


        Store::create([
            'name' => 'Khilkhet Store',
        ]);


        Store::create([
            'name' => 'Dhanmondi Store',
        ]);


        Store::create([
            'name' => 'Mirpur Store',
        ]);

        Store::create([
            'name' => 'Dewanbagh Store',
        ]);

        Store::create([
            'name' => 'Gazipur Store',
        ]);

        Store::create([
            'name' => 'Rangpur Store',
        ]);

        Store::create([
            'name' => 'Gaibandha Store',
        ]);

        Store::create([
            'name' => 'Moymonsingh Store',
        ]);
    }
}
