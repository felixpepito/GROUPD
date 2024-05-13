@extends('layouts.main')

@section('extra')

<div class="container mt-4" style="position:absolute; left:50%; top:50%; transform:translate(-45%,-10%);">
    <div class="row">
        <div class="col-md-6 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Admin Login</h2>

                    <form method="POST" action="{{ route('adminlogin')  }}">
                        @csrf
                        <div class="mb-3">
                            <input type="email" id="email" name="email" class="form-control" required placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" id="password" name="password" class="form-control" required placeholder="Password">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
