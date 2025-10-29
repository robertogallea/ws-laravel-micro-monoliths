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



    }
}
