<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\Order;
use Illuminate\Support\Facades\Redis;

class PublishNewOrderToRedisStream
{
    public function handle(OrderCreated $event)
    {
        $user_id = $event->order->user_id;

        $data = [
            'user_id' => $user_id,
            'orders_count' => Order::where('user_id', $user_id)->count(),
            'orders_total_amount' => Order::where('user_id', $user_id)->sum('amount')
        ];

        Redis::publish('orders-stream', json_encode($data));
    }
}