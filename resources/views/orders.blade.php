@extends('layouts.main')

@section('extra')

<nav class="sb-topnav navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand ps-3">Admin Dashboard</a>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('admindashboard') }}">Dashboard</a></li>
                    <li><a class="dropdown-item" href="{{ route('orders') }}">Orders</a></li>
                    <li><a class="dropdown-item" href="{{ route('addproduct') }}">Add Product</a></li>
                    <li><a class="dropdown-item" href="{{ route('customer') }}">Customers</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin-logout') }}">log out</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div id="layoutSidenav"></div>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid mt-4 py-5 ">
            <div class="row" id="orders-container">
                @php
                    $groupedOrders = collect($orders)->groupBy('order_id');
                @endphp

                @foreach ($groupedOrders as $orderId => $orderGroup)
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card bg-white text-dark order-card">
                            <div class="card-body">
                               
                                @foreach ($orderGroup as $order)
                                    <p>Product name: {{ $order->product_name }}</p>
                                    <p>ID: {{ $order->order_id }}</p>
                                    <p>Price: ₱ {{ $order->product_price }}</p>
                                    <p>Items: {{ $order->quantity }}</p>
                                    <p>Date: {{ $order->order_date }}</p>
                                    <p>Total: ₱ {{ $order->total }}</p>
                                    <input type="hidden" name="order_id[]" value="{{ $order->order_id }}">
                                    <input type="hidden" name="order_date[]" value="{{ $order->order_date }}">
                                @endforeach
                        
                                <div class="text-center mt-4">
                                <form id="deleteOrderGroupForm" action="{{ route('deleteOrderGroup', ['orderId' => $order->order_id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Delete Group</button>
                                </form>
                              </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('deleteOrderGroupForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            const actionUrl = this.action;

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to delete this group of orders? This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(actionUrl, {
                            method: 'DELETE',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': formData.get('_token')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Deleted!', 'The group of orders has been deleted.', 'success').then(() => {
                                    window.location.href = "{{ route('orders') }}";
                                });
                            } else {
                                Swal.fire('Error!', 'Failed to delete the group of orders. Please try again.', 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire('Error!', 'An unexpected error occurred. Please try again.', 'error');
                        });
                }
            });
        });
    });
</script>

@endsection
