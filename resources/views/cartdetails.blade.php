@extends('layouts.cartdetails')

@section('cartdetails-content')
<div class="menu-container">
    <div class="Order-Menu mt-4" style="position:absolute; left:50%; top:50%; transform:translate(-50%,-40%);">
        <div>
            <h1>Cart Details</h1>

            <div class="mb-3">
                <label for="order_number" class="form-label">Order Number</label>
                <p id="order_number">123456</p>
            </div>
            <div class="mb-3">
                <label for="student_name" class="form-label">Student Name</label>
                <p id="student_name">John Doe</p>
            </div>
            <div class="mb-3">
                <label for="student_id" class="form-label">Student ID</label>
                <p id="student_id">S12345</p>
            </div>
            <div class="mb-3">
                <label for="cellphone_number" class="form-label">Cellphone Number</label>
                <p id="cellphone_number">123-456-7890</p>
            </div>
        </div>
        <form action="ordersuccess">
            <button class="order-button" >submit</a></button>
            </form>
    </div>
</div>



@endsection

        
          
              