@extends('layouts.main')
@section('extra')
<div class="container">
        <div class="midiv Order-Menu " style="position:absolute; left:70%; top: 30%; transform:translate(-50%,-40%); ">
            <h1 class ="success mb-4">Order succes   </h1><br>
            <div class="order mb-4">
                <label for="order_number" class="form-label">Order Number:</label><br>
                 </div>
                  <div class="student mb-4">
                   <label for="student_name" class="form-label">Student Name:</label><br>
                   </div>
                   <div class="id mb-4">
                   <label for="student_id" class="form-label">Student ID:</label><br>
                  </div>
                <div class="phonemb-4">
               <label for="cellphone_number" class="form-label">Cellphone Number:</label><br><br>
               <a class="btn btn-lg" href="{{ asset('home')}}" role="button">Done</a>

              </div>
            </div>
       </div>
@endsection



