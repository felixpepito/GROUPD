<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class OrderController extends Controller
{
    public function showReceipt($orderId)
    {
        $orders = Order::where('order_id', $orderId)->get();
    $finalTotal = $orders->sum('total');
    return view('receipt', compact('orders', 'finalTotal', 'orderId'));
    }

    public function placeOrder(Request $request)
    {
        $orderItems = $request->input('order_items');
        $total = 0;
        $orderId = uniqid();

        foreach ($orderItems as $item) {
            $total += $item['price'] * $item['quantity'];
            
            Order::create([
                'product_name' => $item['name'],
                'order_id' => $orderId,
                'product_price' => $item['price'],
                'quantity' => $item['quantity'],
                'order_date' => now(),
                'total' => $item['price'] * $item['quantity'],
                'status' => false
            ]);
        }

        return response()->json(['success' => true, 'order_id' => $orderId]);
    }

    public function showOrder()
    {
        $products = Order::with('items')->get();
        return view('orders', ['products' => $products]);
    }

    public function Ordercomplete($orderId)
{
    $orders = Order::where('order_id', $orderId)->get();

    foreach ($orders as $order) {
        $order->status = true; // Or 1 if you want to use integers
        $order->save();
    }

    return redirect('/mainpage')->with('success', 'Order marked as complete.');
}

    public function showSuck()
    {
        // Get only orders that are not completed
        $orders = Order::where('status', false)
            ->select('order_id', 'product_name', 'product_price','quantity', 'order_date', 'total')
            ->get();
        $finalTotal = Order::where('status', false)->sum('total');
        
        return view('ordersuccess', ['orders' => $orders, 'finalTotal' => $finalTotal]);
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
            Order::truncate();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error deleting all orders: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to delete all orders. Please try again.'], 500);
        }
    }

}
