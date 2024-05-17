<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Order;

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
            // Check if the authenticated user is an admin
            if (Auth::user()->isAdmin()) {
                // Authentication successful; generate login session for admin
                $request->session()->regenerate();

                // Redirect to the admin dashboard
                return redirect()->intended('admindashboard');
            } else {
                // Not an admin; logout and redirect back with error message
                Auth::logout();
                return redirect('/adminlogin')->withErrors([
                    'email' => 'You are not authorized as an admin.',
                ])->withInput($request->only('email'));
            }
        }

        // Redirect back to login page with error message if authentication fails
        return redirect('/adminlogin')->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    // Handle the admin logout request
    public function adminlogout(Request $request)
    {
        // Logout the authenticated admin
        Auth::logout();

        // Flush all session data and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the admin login page
        return redirect('/adminlogin');
    }

    // Display the admin dashboard
    public function admindashboard()
    {
        // Check if the user is authenticated as an admin
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            // Redirect to admin login page if not authenticated as admin
            return redirect('/adminlogin')->with('error', 'Unauthorized Access');
        }

        // Get all products from the database
        $products = Products::all();
        return view('admindashboard', ['products' => $products]);
    }
}
