

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class userController extends Controller
{
    public function store(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Create a new customer record
        $customer = user::create($validatedData);

        // Optionally, you can redirect the user to another page after successful submission
        return redirect()->route('user')->with('success', 'Customer details saved!');
    }
}
