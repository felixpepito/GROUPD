<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $orderItems = $request->input('order_items');
        $uniqueOrderId = uniqid();

        foreach ($orderItems as $item) {
            Order::create([
                'order_id' => $uniqueOrderId,
                'product_name' => $item['name'],
                'product_price' => $item['price'],
                'quantity' => $item['quantity'],
                'order_date' => now(),
                'total' => $item['price'] * $item['quantity'],
            ]);
        }

        return response()->json(['message' => 'Order placed successfully'], 200);
    }

    public function getOrderItems($orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $orderItems = $order->orderItems; // Gamitin ang orderItems method para kunin ang mga kaugnay na order items

        return response()->json(['orderItems' => $orderItems]);
    }
    public function showOrder()
    {
        $products = Order::all();
        return view('orders', ['products' => $products]);
    }

    public function index()
    {
        $orders = Order::all()->groupBy('order_id');
        return view('orders.index', compact('orders'));
    }

    public function markAsComplete($id)
    {
        $order = Order::findOrFail($id);
        $order->status = true;
        $order->save();

        return response()->json(['success' => true]);
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['success' => true]);
    }

    public function deleteAllOrders()
    {
        try {
            Order::truncate(); // Delete all orders from the orders table
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error deleting all orders: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to delete all orders. Please try again.'], 500);
        }
    }
}
