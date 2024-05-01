<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products; // Import your Product model

class ProductsController extends Controller
{
    public function index()
    {
        // Retrieve products from the database
        $products = Products::all(); // Assuming 'Product' is your model for products

        // Pass the retrieved products to the view
        return view('mainpage', ['products' => $products]);

    }

public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'Product_NAME' => 'required|string|max:255',
        'Product_PRICE' => 'required|string',
        'Image_Name' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new product instance
        $products = new Products();
        $products->Product_NAME = $request->Product_NAME;
        $products->Product_PRICE = $request->Product_PRICE;
        $products->Image_Name = $request->Image_Name;

        // Save the product to the database
        $products->save();

        // Redirect back to the page with a success message
        return redirect()->back()->with('success', 'Product added successfully.');
    }

}