@extends('layouts.ordersuccess')

@section('ordersuccess-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-50">
            <div class="card">
                <div class="card-header" style="background-color: brown; color: white;">Order Success</div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="order_number" class="form-label">Order Number:</label>
                    
                        </div>
                        <div class="mb-3">
                            <label for="student_name" class="form-label">Student Name:</label>
                           </div>
                          <div class="mb-3">
                            <label for="student_id" class="form-label">Student ID:</label>
                           </div>
                         <div class="mb-3">
                            <label for="cellphone_number" class="form-label">Cellphone Number:</label>
                         </div>
                    </div>
                     <form action="mainpage ">
                        <button class="order-button mb-3 "  >button</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
                       
                   