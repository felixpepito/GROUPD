<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products; // Import your Product model

class productsController extends Controller
{
    public function index()
    {
        // Retrieve products from the database
        $products = Products::all(); // Assuming 'Product' is your model for products

        // Pass the retrieved products to the view
        return view('mainpage', ['products' => $products]);
    }
}