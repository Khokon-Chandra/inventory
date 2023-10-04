<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Order;
use App\Models\Transfer;
use App\Models\TransferItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Company::factory(10)->create();

        \App\Models\Store::factory(100)->create();

        \App\Models\Customer::factory(50)->create();

        \App\Models\Category::factory(100)->create();


        \App\Models\User::factory(2000)->create();


        \App\Models\User::factory()->create([
            'store_id'     => 1,
            'name'         => 'Test User',
            'email'        => 'admin@admin.com',
            'password'     => bcrypt(12345678),
        ]);

        \App\Models\Product::factory(200)->create();

        \App\Models\Stock::factory(1000)->create();


        \App\Models\Order::factory(1000)->create();


        \App\Models\OrderItem::factory(1000)->create();
        \App\Models\OrderItem::factory(1000)->create();
        // \App\Models\OrderItem::factory(1000)->create();
        // \App\Models\OrderItem::factory(1000)->create();


        Transfer::factory(500)->create();
        TransferItem::factory(1000)->create();



        //Update order paid unpaid 

        foreach(Order::all() as $order){
            $paid = rand(100,$order->total_price);
            $due  = $order->total_price - $paid;

            Order::where('id',$order->id)->update([
                'paid' => $paid,
                'due'  => $due,
            ]);
        }


    }
}