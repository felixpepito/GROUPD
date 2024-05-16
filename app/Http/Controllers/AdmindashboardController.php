<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Import the Order model

class AdmindashboardController extends Controller
{
    public function admindashboard()
    {
        $orders = Order::all();

        return view('admindashboard', compact('orders'));
    }
}
