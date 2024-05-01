@extends('layouts.main')

@section('extra')
<div class="menu-container mt-6 d-flex flex-column justify-content-between py-5 px-5"style="position:absolute; left:50%; top:50%; transform:translate(-50%,-10%); height: 60px;">">
    <div class="Order-Menu mt-3 d-flex flex-column justify-content-between py-3 px-4"
         style="position:absolute; left:55%; top:50%; transform:translate(-50%,-19.6%);">
           <div>
            <h1>Cart Details</h1> 
            <div>
                <label for="Order_Number" class="form-label">Order Number:</label>
                <p id="Order_Number"></p>
            </div>
            <div>
                <label for="Customer_Name" class="form-label">Student Name</label>
                <p id="Customer_Name"></p>
            </div>
            <div>
                <label for="User_Contact No" class="form-label">Cellphone Number:</label>
                <p id="User_Contact No"></p>
            </div>
                <div >
                <label for="id" class="form-label">Student ID:</label>
                <p id="id"></p>
            </div>
            <div>
                <label for="Product_Price" class="form-label">Product Price:</label>
                <p id="Product_Price"></p>
            </div>
            <div>
                <label for="Product_Quantity" class="form-label">Product Quantity:</label>
                <p id="Product_Quantity"></p>
            </div>
            <div>
                <label for="Product_Name" class="form-label">Product Name:</label>
                <p id="Product_Name"></p>
            </div>
            <div>
                <label for="Product_Total" class="form-label">Total: </label>
                <p id="Product_Total"></p>
            </div>
               <div class="d-flex justify-content-center mt-3"> <!-- Flex container for buttons with centered alignment -->
                <a class="btn-cta btn-lg btn-cta text-decoration-none text-white me-5" href="{{ asset('ordersuccess')}}" role="button">Next</a> <!-- Use 'me-3' for margin between buttons -->
                <a class="btn-cta btn-lg btn-cta text-decoration-none text-white  " href="{{ asset('customerdetails')}}" role="button">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
