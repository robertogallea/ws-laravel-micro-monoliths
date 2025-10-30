<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\OrderItemFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $orders = Order::factory()->count(20)->create();
        collect(range(1, 50))->each(function (int $index) use ($orders) {
            OrderItem::factory()->create([
                'order_id' => $orders->random()->id,
                'product_id' => rand(1, 20)
            ]);
        });



    }
}
