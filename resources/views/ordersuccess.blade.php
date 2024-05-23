@extends('layouts.main')

@section('extra')
<div class="container">
    <div class="midiv Order-Menu mt-6 d-flex flex-column justify-content-between py-5 px-5" style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); height: auto; max-width: 600px; width: 100%; background-color: #fff; border: 1px solid #ccc; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h1 class="text-center mb-4">Order Success</h1>
        @if(isset($orders) && $orders->count() > 0)
            @foreach ($orders as $order)
                <div class="order-details mb-4">
                    <div class="order mb-2">
                        <label class="form-label"><strong>Product Name:</strong> {{ $order->product_name }} x{{ $order->quantity }}</label>
                    </div>
                    <div class="price mb-2">
                        <label class="form-label"><strong>Price:</strong> ₱{{ number_format($order->product_price, 2) }}</label>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">No products found.</p>
        @endif

        <div class="final-total">
            <label class="form-label"><strong>Total:</strong> ₱{{ number_format($finalTotal, 2) }}</label>
        </div>
        <div class="text-center mt-4">
            <a class="btn btn-primary btn-cta text-decoration-none text-white" href="{{ url('/mainpage') }}" role="button">Done</a>
        </div>
    </div>
</div>
@endsection
