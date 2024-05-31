@extends('layouts.main')

@section('extra')
<div class="container">
    <div class="midiv Order-Menu mt-6 py-5 px-5" style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); max-height: 80vh; max-width: 600px; width: 100%; background-color: #fff; border: 1px solid #ccc; box-shadow: 0 0 10px rgba(0,0,0,0.1); font-family: 'Courier New', Courier, monospace; overflow-y: auto;">
        <div class="text-center mb-4">
            <img src="{{ asset('img/spclogo.png') }}" alt="SPC Logo" style="width: 150px; height: auto; margin-right: 10px;">
        </div>
        <p class="text-center mb-4" style="opacity: 0.7;">This is official receipt</p>
        <hr style="border-top: 1px dashed #ccc;">
        @php
            $totalK = 0;
        @endphp
        
        @if(isset($orders) && $orders->count() > 0)
            @foreach ($orders as $order)
                @php
                    $totalK += $order->product_price * $order->quantity;
                @endphp
                <div class="order-details" style="border-bottom: 1px dashed #ccc; padding-bottom: 10px;">
                    <div class="order">

                        <label class="form-label" style="display: block; opacity: 0.7;">
                            <strong>Product Name:</strong> {{ $order->product_name }} <br>ID:{{ $order->order_id }}<br>Items: {{ $order->quantity }}
                        </label>
                    </div>
                    <div class="price" style="opacity: 0.7;">
                        <label class="form-label" style="display: block;">
                            <strong>Price:</strong> ₱{{ number_format($order->product_price, 2) }}
                        </label>

                        <label class="form-label" style="display: block; opacity: 0.7;"><strong>Product Name:</strong> {{ $order->product_name }} <br>ID:{{ $order->order_id }}<br>Items: {{ $order->quantity }}</label>
                    </div>
                    <div class="price" style="opacity: 0.7;">
              
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">No products found.</p>
        @endif
        <div class="final-total" style="border-top: 1px dashed #ccc; padding-top: 10px; opacity: 0.7;">

            <label class="form-label" style="display: block; text-align: right;"><strong>Total:</strong> ₱{{ number_format($totalK, 2) }}</label>
        </div>
        
        <div class="text-center" style="margin-top: 20px;">
        <form action="{{ route('completeOrder', ['orderId' => $order->order_id]) }}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit" class="btn-lg btn-danger px-5 text-decoration-none text-white">Done</button>
</form>

        </div>
    </div>
</div>
@endsection
