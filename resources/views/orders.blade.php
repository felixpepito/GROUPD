@extends('layouts.main')

@section('extra')
<nav class="sb-topnav navbar navbar-expand">
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </form>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="{{ asset('admindashboard')}}">Dashboard</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
</div>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 py-5 text-white">Orders</h1>
            <div class="row">
                @foreach ($products as $order)
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-white text-dark mb-4"> 
                        <div class="card-body">
                            <p>Product: {{ $order->product_name }}</p>
                            <p>Price: ₱ {{ $order->product_price }}</p>
                            <p>Date: {{ $order->order_date }}</p>
                            <p>Total: ₱ {{ $order->total }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</div>
@endsection
