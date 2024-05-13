<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::all();
        return view('cart.index', compact('cartItems'));
    }

    public function create()
    {
        return view('cart.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            // Add validation rules for the fields
        ]);

        // Create a new cart item
        Cart::create([
            // Assign values from the request
        ]);

        return redirect()->route('cart.index')->with('success', 'Cart item created successfully');
    }

    public function edit($id)
    {
        $cartItem = Cart::findOrFail($id);
        return view('cart.edit', compact('cartItem'));
    }

    public function update(Request $request, $id)
    {
        // Find the cart item by id
        $cartItem = Cart::findOrFail($id);

        // Update the cart item
        $cartItem->update([
            // Update fields based on request
        ]);

        return redirect()->route('cart.index')->with('success', 'Cart item updated successfully');
    }

    public function destroy($id)
    {
        // Find the cart item by id and delete it
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Cart item deleted successfully');
    }
}
