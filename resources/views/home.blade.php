
@extends('layouts.main')

@section('content')


<div class="container mt-4 " style="position:absolute; left:35%; top:50%; transform:translate(-50%,-50%);">
 <div class="row">
        <div class="col-md-12 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center mb-4">Welcome to Your App</h1>
                    <p class="card-text text-center">This is your home page content. Customize it as needed.</p>
                    <p class="card-text text-center">This is your home page content. Customize it as needed.</p> 
                    <p class="card-text text-center">This is your home page content. Customize it as needed.</p> 
                    <p class="card-text text-center">This is your home page content. Customize it as needed.</p> 
                    <p class="card-text text-center">This is your home page content. Customize it as needed.</p> 
                    <p class="card-text text-center">This is your home page content. Customize it as needed.</p>  
                       <div><br><br><br><br><br></div>
                       <a class="btn mx-5" href="{{ asset('mainpage')}}" role="button">Order Now</a>
                        
                      <a class="btn mx-5"  href="{{ asset('admin')}}" role="button">Admin       </a>
                      
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection