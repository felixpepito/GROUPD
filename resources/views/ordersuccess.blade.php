@extends('layouts.main')

@section('extra')
<div class="container">
    <div class="midiv Order-Menu mt-6 py-5 px-5" style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); max-height: 80vh; max-width: 600px; width: 100%; background-color: #fff; border: 1px solid #ccc; box-shadow: 0 0 10px rgba(0,0,0,0.1); font-family: 'Courier New', Courier, monospace; overflow-y: auto;">
        <div class="text-center mb-4">
            <img src="{{ asset('img/spclogo.png') }}" alt="SPC Logo" style="width: 150px; height: auto; margin-right: 10px;">
        </div>
        <p class="text-center mb-4" style="opacity: 0.7;">This is official receipt</p>
        <hr style="border-top: 1px dashed #ccc;">
        @if(isset($orders) && $orders->count() > 0)
            @foreach ($orders as $order)
                <div class="order-details" style="border-bottom: 1px dashed #ccc; padding-bottom: 10px;">
                    <div class="order">
                        <label class="form-label" style="display: block; opacity: 0.7;"><strong>Product Name:</strong> {{ $order->product_name }} <br>Items: {{ $order->quantity }}</label>
                    </div>
                    <div class="price" style="opacity: 0.7;">
                        <label class="form-label" style="display: block;"><strong>Price:</strong>{{ number_format($order->product_price, 2) }}</label>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">No products found.</p>
        @endif
        <div class="final-total 1px dashed #ccc; " style="border-top: 1px dashed #ccc; padding-top: 10px; opacity: 0.7;">
            <label class="form-label" style="display: block; text-align: right;"><strong>Total:</strong> ₱{{ number_format($finalTotal, 2) }}</label>
        </div>
        <div class="text-center 1px dashed #ccc;">
            <a class="btn  btn-cta text-decoration-none text-white" href="{{ url('/mainpage') }}" role="button">Done</a>
        </div>
    </div>
</div>
@endsection