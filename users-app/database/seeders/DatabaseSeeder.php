<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user1 = User::factory()->create([
            'name' => 'User One',
            'email' => 'user1@example.com',
        ]);

        $user2 = User::factory()->create([
            'name' => 'User Two',
            'email' => 'user2@example.com',
        ]);

        $users = collect([$user1, $user2]);

        collect(range(1,20))->each(function (int $index) use ($products) {
            $order = Order::factory()->create();
            $orderProducts = $products->random(rand(2, 5));
            $order->products()->attach($orderProducts->pluck('id'));
            $order->update(['amount' => $orderProducts->sum('price')]);
        });


    }
}
