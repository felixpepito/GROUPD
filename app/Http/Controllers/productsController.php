<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('mainpage', ['products' => $products]);
    }

    public function adminDashboard()
    {
        $products = Products::all();
        return view('admindashboard', ['products' => $products]);
    }

    public function store(Request $request)
    {
        // Validate 
        $request->validate([
            'Product_NAME' => 'required|string|max:255',
            'Product_PRICE' => 'required|string',
            'Image_Name' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Process uploaded image
        $filename = $this->uploadImage($request->file('Image_Name'));

        // Create a new product instance
        $product = new Products();
        $product->Product_NAME = $request->Product_NAME;
        $product->Product_PRICE = $request->Product_PRICE;
        $product->Image_Name = $filename;
        $product->save();

        return redirect()->back()->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('editproduct', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        // Validate the request data
        $request->validate([
            'Product_NAME' => 'required|string|max:255',
            'Product_PRICE' => 'required|string',
            'Image_Name' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update product fields
        $product->Product_NAME = $request->Product_NAME;
        $product->Product_PRICE = $request->Product_PRICE;

        // Process updated image if provided
        if ($request->hasFile('Image_Name')) {
            $filename = $this->uploadImage($request->file('Image_Name'));
            // Delete previous image
            Storage::delete('public/images/' . $product->Image_Name);
            $product->Image_Name = $filename;
        }

        $product->save();

        return redirect()->route('admindashboard')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);

        // Delete the product image from storage
        Storage::delete('public/images/' . $product->Image_Name);

        // Delete the product from database
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    private function uploadImage($image)
    {
        $originalFilename = $image->getClientOriginalName();
        $filename = Str::slug(pathinfo($originalFilename, PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $filename);
        return $filename;
    }
}
