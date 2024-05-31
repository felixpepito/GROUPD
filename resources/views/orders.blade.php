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
        <div class="container-fluid  mt-4 py-5 ">">
            <div class="row" id="orders-container">
                @foreach ($orders as $order)
                <div class="col-xl-3 col-md-6 order-card" id="order-{{ $order->id }}">
                    <div class="card bg-white text-dark mb-4">
                        <div class="card-body">
                            <p>Product name: {{ $order->product_name }}</p>
                            <p>ID: {{$order->order_id}}</p>
                            <p>Price: ₱ {{ $order->product_price }}</p>
                            <p>Quantity: {{$order->quantity}}</p>
                            <p>Date: {{ $order->order_date }}</p>
                            <p>Total: ₱ {{ $order->total }}</p>
                        
                            <form action="{{ route('orders.delete', $order->id) }}" method="POST" class="delete-order-form mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete Order</button>
                            </form>
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
    document.querySelectorAll('.complete-order-form').forEach(function(form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const card = this.closest('.order-card');
            const formData = new FormData(this);
            const actionUrl = this.action;

            fetch(actionUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': formData.get('_token')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'Order Completed!',
                        text: 'The order has been marked as complete.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        card.querySelector('.order-status').textContent = 'Completed';
                        this.remove(); // Remove the complete order form
                    });
                } else {
                    Swal.fire('Failed!', 'Failed to complete the order. Please try again.', 'error');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    document.querySelectorAll('.delete-order-form').forEach(function(form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const card = this.closest('.order-card');
            const formData = new FormData(this);
            const actionUrl = this.action;

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to delete this order? This process cannot be undone.',
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
                            Swal.fire({
                                title: 'Order Deleted!',
                                text: 'The order has been deleted.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                card.remove();
                            });
                        } else {
                            Swal.fire('Failed!', 'Failed to delete the order. Please try again.', 'error');
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            });
        });
    });
});
</script>
@endsection
