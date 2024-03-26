@extends('layouts.customerdetails')

@section('customerdetails-content')
<div class="menu-container">
        

        <div class="Order-Menu d-flex flex-column justify-content-between py-3 px-3">
                   
        <form action="cartdetails"  >
                
                    <h1> Customer Details</h1>
            
                            <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Next</button>
                </form>
            </div>
        </div>
            
                
                    
    @endsection

     