@extends('layouts.main')

@section('extra')
<nav class="sb-topnav navbar navbar-expand">
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <!-- Search form (if needed) -->
    </form>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
        <a class="dropdown-item" href="{{ route('admindashboard') }}">Dashboard</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('orders') }}">Orders</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('addproduct') }}">Add Product</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('customer') }}">Customers</a>
                </li>
        </li>
    </ul>
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="col-md-6 offset-md-2 px-5 py-5 mt-5" style="position:absolute; left:30%; top:80%; transform:translate(-40%,-5%);">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mt-4 mb-4">Add Product</h1>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="POST" action="{{ route('addproduct.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="Product_NAME" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="Product_NAME" name="Product_NAME" required placeholder="Product Name">
                            </div>
                            <div class="mb-3">
                                <label for="Product_PRICE" class="form-label">Price</label>
                                <input type="number" class="form-control" id="Product_PRICE" name="Product_PRICE" step="0.01" required placeholder="Price">
                            </div>
                            <div class="mb-3">
                                <label for="Image_Name" class="form-label">Product Image</label>
                                <input type="file" class="form-control" id="Image_Name" name="Image_Name" accept="image/*" required placeholder="Product Image">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
