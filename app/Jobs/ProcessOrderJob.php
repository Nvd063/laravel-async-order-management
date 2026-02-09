<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $orderId;

    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    public function handle(): void
    {
        $order = Order::with('items')->find($this->orderId);

        if (! $order) {
            return;
        }

        // 🔥 Simulate heavy processing
        sleep(5);

        // Example tasks
        Log::info('Order processed', [
            'order_id' => $order->id,
            'total' => $order->total_amount,
        ]);

        // Update status
        $order->update([
            'status' => 'processing'
        ]);
    }
}
