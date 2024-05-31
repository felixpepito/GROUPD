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
    try {
        $orderItems = $request->input('order_items');

        if (!is_array($orderItems) || empty($orderItems)) {
            throw new \InvalidArgumentException('Invalid order items data.');
        }

        $orderId = uniqid(); // Generate a unique order ID here
        $total = 0;

        // Start a database transaction
        \DB::beginTransaction();

        foreach ($orderItems as $item) {
            // Accumulate total for all items
            $total += $item['price'] * $item['quantity'];

            Order::create([
                'product_name' => $item['name'],
                'order_id' => $orderId, // Use the same order ID for all items in this order
                'product_price' => $item['price'],
                'quantity' => $item['quantity'],
                'order_date' => now(),
                'total' => $total, // Use the accumulated total for all items
                'status' => false
            ]);
        }

        // Commit the transaction
        \DB::commit();

        return response()->json(['success' => true, 'order_id' => $orderId]);
    } catch (\Exception $e) {
        // Rollback the transaction in case of an error
        \DB::rollBack();

        Log::error('Error placing order: ' . $e->getMessage());
        return response()->json(['error' => 'Failed to place order. Please try again.'], 500);
    }
}
public function completeOrder(Request $request, $orderId)
{
    try {
        // Find all orders with the same order_id
        $orders = Order::where('order_id', $orderId)->get();

        // If orders are found, update their status to Completed and reset data
        foreach ($orders as $order) {
            $order->status = true; // Assuming status is a boolean field
            // Reset other data as needed, such as setting quantity to 0, etc.
            $order->save();
        }

        // Redirect back to the mainpage with a success message
        return redirect('/mainpage')->with('success', 'Orders completed successfully.');
    } catch (\Exception $e) {
        // Log the error and return an error message
        Log::error('Error completing orders: ' . $e->getMessage());
        return redirect('/mainpage')->with('error', 'Failed to complete orders.');
    }
}


    public function showOrder()
    {
        $products = Order::with('items')->get();
        return view('orders', ['products' => $products]);
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