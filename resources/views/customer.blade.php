@extends('layouts.main')

@section('extra')
<nav class="sb-topnav navbar navbar-expand">
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </form>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
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
</div>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 py-5 text-decoration-none text-white">Admin dashboard</h1>
            <div class="row">
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-users me-1"></i>
                    Customers
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>ID_Number</th>
                                <th>Phone_Contact</th>
                                <th>Actions</th> <!-- Added Actions column -->
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->ID_Number }}</td>
                                <td>{{ $customer->phone_contact }}</td>
                                <td>
                                    <!-- Delete Button -->
                                    <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" style="display:inline;" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm delete-button">Delete</button>
                                    </form>
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

<!-- Include SweetAlert Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');

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
    });
</script>

@endsection
