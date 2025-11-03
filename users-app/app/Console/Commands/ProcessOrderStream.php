<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class ProcessOrderStream extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:process-order-stream';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process order streams';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            Redis::subscribe(['orders-stream'], function (string $message, $channel) {
                Log::info($message);
                Log::channel('syslog')->info($message);
                $this->info("[$channel] $message");
                $message = json_decode($message, true);
                $u = User::find($message['user_id'])->first();
                Cache::put('users:' . $u->id . ':orders-count', $message['orders_count']);
                Cache::put('users:' . $u->id . ':orders-total-amount', $message['orders_total_amount']);
            });
        } catch (\Exception $e) {
            $this->error($e->getMessage() . ' - aborting...');
        }
    }
}
