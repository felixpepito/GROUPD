@extends('layouts.main')


@section('extra')


<div class="container mt-3  "style="position:absolute; left:50%; top:40%; transform:translate(-50%,-50%);">  ">
    <div class="col-md-4 m-auto">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Admin Login</h2>
                    <form method="POST" action="#">
                        <div class="row">
                       <input type="email" id="email" name="email" class="form-control" required placeholder= "Email">
                        </div><br>
                        <div class="mb-3">
                            <input type="password" id="password" name="password" class="form-control" required placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection