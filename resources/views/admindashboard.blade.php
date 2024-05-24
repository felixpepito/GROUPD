@extends('layouts.main')

@section('extra')

    @if(Auth::check() && Auth::user()->isAdmin())
        <!-- Admin Dashboard Content Here -->
    @else
        <p>Unauthorized Access. Please <a href="{{ asset('adminlogin') }}">login as admin</a>.</p>
    @endif

    <nav class="sb-topnav navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand ps-3">Admin Dashboard</a>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown"role="button" data-bs-toggle="dropdown" aria-expanded="false">settings</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('admin-logout') }}">log out</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div id="layoutSidenav">
</div>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid mt-4 py-5 ">
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <i class="fas fa-shopping-cart fa-2x"></i>
                                <div class="mt-2">Orders</div>
                            </div>
                            <a class="small text-white stretched-link" href="orders">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card bg-warning text-white h-100">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <i class="fas fa-plus-circle fa-2x"></i>
                                <div class="mt-2">Add Product</div>
                            </div>
                            <a class="small text-white stretched-link" href="addproduct">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <i class="fas fa-users fa-2x"></i>
                                <div class="mt-2">Customers</div>
                            </div>
                            <a class="small text-white stretched-link" href="customer">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-table me-1"></i>
                        Products
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Image</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->Product_NAME }} - ₱{{ number_format($product->Product_PRICE, 2) }}</td>
                                    <td>
                                        <img class="product-image" src="{{ asset('img/'. $product->Image_Name) }}" alt="{{ $product->Product_NAME }}" width="50" height="50">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-primary btn-sm me-2 edit-button" data-url="{{ route('products.edit', $product->id) }}">Edit</button>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm delete-button">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');
        const editButtons = document.querySelectorAll('.edit-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const form = this.closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        editButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const url = this.getAttribute('data-url');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will be redirected to the edit page.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, go ahead!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
                
            });
        });
    });
</script>
@endsection
