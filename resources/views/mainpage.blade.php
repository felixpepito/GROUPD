@extends('layouts.main')

@section('content')
    <div class="menu-container">
        @foreach ($products as $product)
            <div class="menu-item">
                <img class="fried-chicken" src="{{ asset('img/'. $product->Image_Name)  }}" alt="Fried Chicken">
                 <p class="php">₱ {{ $product->Product_PRICE }}</p>
                <p class="php"> {{ $product->Product_NAME }}</p>
            </div>
        @endforeach
          <div class="Order-Menu d-flex flex-column justify-content-between py-5 px-4">
             <div class="order">
                <h2>ORDER MENU</h2>
                <ul class="order-list">
                </ul>
            </div>
           <div class="xd-flex gap-4 justify-between">
                <a class=" btn-cta btn-lg text-decoration-none text-white " href="{{ asset('customerdetails') }}" role="button">Order</a>
                <p class="total mt-4 d-flex flex-column justify-content-between py-3 px-2 " style="position:absolute; right:15%; top:80%; transform:translate(-0%,-1%);">Total: ₱100</p>
            </div>
        </div>
    </div>
@endsection