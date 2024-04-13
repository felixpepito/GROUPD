<?php

namespace App\Http\userControllers;

use Illuminate\Http\Request;
use App\Models\user; // Import the user model

class userController extends Controller
{
    public function store(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // Use 'users' table instead of 'customers'
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Create a new user record
        $newUser = user::create($validatedData);

        // Optionally, redirect the user
        return redirect()->route('user')->with('success', 'User details saved!');
    }
}
