@extends('layouts.main')


@section('extra')

<div class="container d-flex pt-5x ">
    <div class="col-md-4 m-auto">
        <div class=" mydiv bg-white shadow p-3 mb-4 bg-body-tertiary  rounde" style="border-radius: 30px;">
            <form>
                <h1> Customer Details</h1><br>
                      <div class="mb-2">
                                   <input type="text" class="form-control" id="name" name="name" required   placeholder="Name"><br>
                               </div>
                               <div class="mb-3">
                                   <input type="email" class="form-control" id="email" name="email" required placeholder="Email"><br>
                               </div>
                               <div class="mb-3">
                                   <input type="text" class="form-control" id="address" name="address" required placeholder="Address"><br>
                               </div>
                               <div class="mb-3 text-center">
                                   <input type="text" class="form-control" id="phone" name="phone" required placeholder="Phone"><br>
                                   <a class="btn btn-lg" href="{{ asset('cartdetails')}}" role="button">Next</a>
                           </form>

        </div>
    </div>
    </div>
@endsection

