<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jobs\ProcessOrderJob;
use App\Events\OrderPlaced;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    // Place Order
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.product_name' => 'required|string',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:1',
        ]);

        return DB::transaction(function () use ($request) {

            $total = 0;

            foreach ($request->items as $item) {
                $total += $item['quantity'] * $item['price'];
            }

            // Create Order
            $order = Order::create([
                'user_id' => auth()->id(),
                'total_amount' => $total,
                'status' => 'pending',
            ]);

            
            // Create Order Items
            foreach ($request->items as $item) {
                $order->items()->create($item);
            }
            
            event(new OrderPlaced($order));
            ProcessOrderJob::dispatch($order->id);

            
            return response()->json([
                'message' => 'Order placed successfully',
                'order_id' => $order->id,
                'total' => $total,
            ], 201);
        });
    }

    // User Orders List
    public function index()
    {
        $orders = Order::with('items')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return response()->json($orders);
    }

    // Single Order
    public function show($id)
    {
        $order = Order::with('items')
            ->where('user_id', auth()->id())
            ->findOrFail($id);
        
        Gate::authorize('view', $order);

        return response()->json($order);
    }
}
