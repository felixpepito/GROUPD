<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products; // model
use Illuminate\Support\Str; 


class ProductsController extends Controller
{
    public function index()
    {
        // Retrieve product gikan sa database
        $products = Products::all(); 

        // e retrieve ni sa mainpage.blade.php
        return view('mainpage', ['products' => $products]);
    }

    public function adminDashboard()
    {
        // e Retrieve ang  products gikan sa database padulong sa  dashboard
        $products = Product::all(); 

        // didto ni ma view sa admindashboard
        return view('admindashboard', ['products' => $products]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'Product_NAME' => 'required|string|max:255',
            'Product_PRICE' => 'required|string',
            'Image_Name' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Retrieve the uploaded file from the request
        $uploadedFile = $request->file('Image_Name');
    
        // Get the original filename of the uploaded file
        $originalFilename = $uploadedFile->getClientOriginalName();
    
        // Generate a unique filename to store the file
        $filename = Str::slug(pathinfo($originalFilename, PATHINFO_FILENAME)) . '.' . $uploadedFile->getClientOriginalExtension();
    
        // Move the uploaded file to a desired storage location
        $uploadedFile->move(public_path('storage/images'), $filename);
    
        // Create a new product instance
        $product = new Products();
        $product->Product_NAME = $request->Product_NAME;
        $product->Product_PRICE = $request->Product_PRICE;
        $product->Image_Name = $filename; // Store the filename in the database
    
        // Save the product to the database
        $product->save();
    
        // Redirect back to the page with a success message
        return redirect()->back()->with('success', 'Product added successfully.');
    }

    public function destroy($id)
    {
        // Find the product by ID
        $product = Products::findOrFail($id);

        // Delete the product
        $product->delete();

        return redirect()->back()->with('success', 'Product added successfully.');
    }
}
