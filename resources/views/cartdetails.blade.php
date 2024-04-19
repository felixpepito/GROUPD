@extends('layouts.main')

@section('extra')
<div class="menu-container mt-6 d-flex flex-column justify-content-between py-5 px-5"style="position:absolute; left:50%; top:50%; transform:translate(-50%,-10%); height: 60px;">">
    <div class="Order-Menu mt-3 d-flex flex-column justify-content-between py-3 px-4"
         style="position:absolute; left:55%; top:50%; transform:translate(-50%,-19.6%);">
        <div>
            <h1>Cart Details</h1>

            <div class="d-flex flex-column py-1 px-1">
                <label for="order_number" class="form-label">Order Number</label>
                <p id="order_number">123456</p>
            </div>
            <div class="d-flex flex-column py-1 px-1">
                <label for="student_name" class="form-label">Student Name</label>
                <p id="student_name">John Doe</p>
            </div>
            <div class="d-flex flex-column py-1 px-1">
                <label for="student_id" class="form-label">Student ID</label>
                <p id="student_id">S12345</p>
            </div>
            <div class="d-flex flex-column py-1 px-1">
                <label for="cellphone_number" class="form-label">Cellphone Number</label>
                <p id="cellphone_number">123-456-7890</p>
            </div>
            <div class="d-flex flex-column py-1 px-1">
                <label for="total" class="form-label">Total: </label>
                <p id="total">2 million</p>
            </div>

            <div class="d-flex justify-content-center mt-3"> <!-- Flex container for buttons with centered alignment -->
                <a class="btn-cta btn-lg btn-cta text-decoration-none text-white me-5" href="{{ asset('ordersuccess')}}" role="button">Next</a> <!-- Use 'me-3' for margin between buttons -->
                <a class="btn-cta btn-lg btn-cta text-decoration-none text-white  " href="{{ asset('customerdetails')}}" role="button">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
