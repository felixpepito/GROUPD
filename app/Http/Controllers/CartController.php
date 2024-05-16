<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CartController extends Controller
{
    public function show()
    {
        return view('cartdetails'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'Order_Number' => 'required',
            'Customer_Name' => 'required',
            'User_Contact_No' => 'required',
            'id' => 'required',
            'Product_Price' => 'required',
            'Product_Quantity' => 'required',
            'Product_Name' => 'required',
            'Product_Total' => 'required',
        ]);

        $order = Order::create($request->all());

        return redirect()->route('ordersuccess')->with('success', 'Order placed successfully');
    }
}
