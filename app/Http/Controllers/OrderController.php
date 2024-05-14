<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $orderItems = $request->input('order_items');

        foreach ($orderItems as $item) {
            Order::create([
                'product_name' => $item['name'],
                'product_price' => $item['price'],
                'order_date' => now(), // Use the current date/time for order_date
                'total' => $item['price'] * $item['quantity'], // Calculate total price
            ]);
        }

        return response()->json(['message' => 'Order placed successfully'], 200);
    }
}
