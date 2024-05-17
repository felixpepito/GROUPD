<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class AdmindashboardController extends Controller
{
    public function admindashboard()
    {
        // Check if user is authenticated and admin
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect()->route('adminlogin')->with('error', 'Unauthorized Access');
        }

        $orders = Order::all();
        $products = Products::all();

        return view('admindashboard', compact('orders', 'products'));
    }
}
