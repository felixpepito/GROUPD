<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer; // Use only Customer model

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer', compact('customers')); 
    }
   
    public function create()
    {
        return view('customers.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email', 
            'address' => 'required',
            'phone_contact' => 'required',
        ]);

        Customer::create($request->all());

        return redirect()->route('cartdetails.store'); 
    }
}
