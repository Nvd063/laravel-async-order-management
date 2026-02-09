<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
class LogOrderPlaced
{
    public function handle(OrderPlaced $event)
    {
        \Log::info('Order placed', [
            'order_id' => $event->order->id,
            'total' => $event->order->total_amount
        ]);
    }
}
