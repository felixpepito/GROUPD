@extends('layouts.main')

@section('cartdetails-content')
<div class="menu-container">
     
      <div class="Order-Menu mt-4" style="position:absolute; left:50%; top:50%; transform:translate(-50%,-50%);">
            <form ation="#" method="#">
                <h1> Cart Details </h1>
              
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit Order</button>
            </form>
        </div>
    </div>


@endsection

        
          
              