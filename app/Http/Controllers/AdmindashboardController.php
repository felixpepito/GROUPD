<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Products;
use App\Models\Customer; 
use Illuminate\Support\Facades\Auth;

class AdmindashboardController extends Controller
{
    public function admindashboard()
    {
        // Check if user is admin authenticated
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect()->route('adminlogin')->with('error', 'Unauthorized Access');
        }

        $orders = Order::all();
        $products = Products::all();
        $customers = Customer::all();

        return view('admindashboard', compact('orders', 'products', 'customers'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Products::where('Product_NAME', 'LIKE', "%$query%")->get();
        $orders = Order::all();
        $customers = Customer::all();

        return view('admindashboard', compact('orders', 'products', 'customers'));
    }
    
    public function orders()
    {
        $orders = Order::all();
        return view('orders', compact('orders'));
    }

    public function customer()
    {
        $customers = Customer::all(); // Assuming you have a Customer model
        return view('customer', compact('customers'));
    }

    public function addproduct()
    {
        return view('addproduct');
    }
}
