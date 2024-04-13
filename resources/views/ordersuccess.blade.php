@extends('layouts.main')

@section('extra')
<div class="container">
    <div class="midiv Order-Menu mt-6 d-flex flex-column justify-content-between py-5 px-5"
         style="position:absolute; left:50%; top:50\%; transform:translate(-50%,-62%); height: 550px;">
        <h1 class="success">Order Success</h1><br>
        <div class="order">
            <label for="order_number" class="form-label">Order Number:</label><br>
        </div>
        <div class="student">
            <label for="student_name" class="form-label">Student Name:</label><br>
        </div>
        <div class="id">
            <label for="student_id" class="form-label">Student ID:</label><br>
        </div>
        <div class="phone">
            <label for="cellphone_number" class="form-label">Cellphone Number:</label><br><br>
            <a class="btn btn-lg" href="{{ asset('home')}}" role="button">Done</a>
        </div>
    </div>
</div>
@endsection
