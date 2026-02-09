<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Mail\OrderPlacedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderEmail implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(OrderPlaced $event)
    {
        $order = $event->order->load('items');

        Mail::to($order->user->email)
            ->send(new OrderPlacedMail($order));
    }
}
