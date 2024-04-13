@extends('layouts.main')

@section('extra')


<div class="menu-container  ">
    <div class="Order-Menu mt-3 d-flex flex-column justify-content-between py-3 px-4" style="position:absolute; left:55%; top:50%; transform:translate(-50%,-19.6%);">
        <div>
            <h1>Cart Details</h1>

            <div class="d-flex flex-column justify-content-between py-1 px-1"><br>
                <label for="order_number" class="form-label">Order Number</label>
                <p id="order_number">123456</p>
            </div>
            <div class="d-flex flex-column justify-content-between py-1 px-1"><br>
                <label for="student_name" class="form-label">Student Name</label>
                <p id="student_name">John Doe</p>
            </div>
            <div class="d-flex flex-column justify-content-between py-1 px-1"><br>
                <label for="student_id " class="form-label">Student ID</label>
                <p id="student_id">S12345</p>
            </div>
            <div class="d-flex flex-column justify-content-between py-1 px-1">
                <label for="cellphone_number" class="form-label">Cellphone Number</label>
                <p id="cellphone_number">123-456-7890</p><br>
                <div class="d-flex flex-column justify-content-between py-1 px-1"><br>
                <label for="student_id " class="form-label">Total: </label>
                <p id="student_id">2milion</p>
            </div>
                <a class="btn btn-lg" href="{{ asset('ordersuccess')}}" role="button">Next</a>
            </div>


          </div>
        </div>
</div>
@endsection





