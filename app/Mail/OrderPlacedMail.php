<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon; // ya use Carbon\Carbon;

class OrderPlacedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $orderDate;  // Naya variable

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->orderDate = Carbon::now()->format('d M Y h:i A'); // Ya jo format chahiye
        // Agar timezone set karna ho: Carbon::now('Asia/Karachi')->format(...)
    }

    public function build()
    {
        return $this
            ->subject('Your Order Has Been Placed')
            ->view('emails.order-placed');
    }
}