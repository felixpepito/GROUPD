<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products; // Import your Product model

class AdminController extends Controller
{
    // Show the admin login form
    public function index()
    {
        return view('adminlogin');
    }

    // Handle the admin login request
    public function login(Request $request)
    {
        // Validate the login credentials
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Regenerate session data and redirect to intended URL
            $request->session()->regenerate();
            return redirect()->intended('admindashboard');
        }

        // Redirect back to login page with error message if authentication fails
        return redirect('/adminlogin')->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    // Handle the admin logout request
    public function adminlogout(Request $request)
    {
        // Logout the user, invalidate session, and regenerate CSRF token
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/adminlogin');
    }

    // Display the admin dashboard
    public function admindashboard()
    {
        // Logic for displaying admin dashboard
        return view('admindashboard');
    }
    public function showProducts()
    {
        // Retrieve all products from the database
        $products = Products::all();

        // Pass the products data to the view and render the admin dashboard
        return view('admindashboard', ['products' => $products]);
    }


}
