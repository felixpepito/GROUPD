@extends('layouts.main')

@section('extra')
<div class="container mt-6 d-flex flex-column justify-content-between py-5 px-5"style="position:absolute; left:50%; top:50%; transform:translate(-50%,-0%); height: 550px;">
    <div class="col-md-4 m-auto">
        <div class="mydiv bg-white shadow p-3 mb-4 bg-body-tertiary rounde" style="border-radius: 30px;">
            <form method="POST" action="">
                
                <h1>Customer Details</h1><br>
                <div class="mb-2">
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Name"><br>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Email"><br>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="address" name="address" required placeholder="Address"><br>
                </div>
                <div class="mb-3 text-center ">
                    <input type="text" class="form-control" id="phone_contact" name="phone" required placeholder="Phone"><br>
                    <a class=" btn-cta text-decoration-none text-white me-5" href="{{ asset('cartdetails') }}" role="button ">Next</a>
                    <a class=" btn-cta text-decoration-none text-white " href="{{ asset('mainpage') }}" role="button">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
