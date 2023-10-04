<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $order_id = rand(1,1000);

        $order = Order::find($order_id);

        $company_id    = Order::find($order_id)->company_id;

        $product       = Product::where('company_id',$company_id)->inRandomOrder()->first();

        $quantity = rand(1,20);

        $price   = $product->price;
    
        $sub_toal = $price * $quantity;

        Order::where('id',$order_id)->update([
            'total_price' => $order->total_price + $sub_toal
        ]);

        return [
            'order_id' => $order_id,
            'product_id' => $product->id,
            'quantity'   => $quantity,
            'price'      => $price,
            'sub_total'  => $sub_toal,
        ];
    }
}