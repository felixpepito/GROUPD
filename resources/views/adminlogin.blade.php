

@extends('layouts.main')

@section('extra')


<div class="container mt-4" style="position:absolute; left:50%; top:50%; transform:translate(-45%,-10%);">
    <div class="row">
        <div class="col-md-6 offset-md-2">
            <div class="card">
                <div class="card-body">
                <h2 class="card-title text-center mb-4">Admin Login</h2>
                    <form method="POST" action="">
                        <div class="row">
                       <input type="email" id="email" name="email" class="form-control" required placeholder= "Email">
                        </div><br>
                        <div class="mb-3">
                            <input type="password" id="password" name="password" class="form-control" required placeholder="Password">
                        </div>
                        <a class="btn-cta text-decoration-none text-white" href="admindashboard" role="button">Login</a>
                    </form></a>
                        </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
