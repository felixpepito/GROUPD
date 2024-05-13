@extends('layouts.main')

@section('extra')
<main>
  <h1 class="visually-hidden">SPC ONLINE CAFETERIA</h1>
   <div class="px-5 py-5 my-5 text-center">
    <img src="{{ asset('img/spc3.jpeg')}}" alt="Logo" width="190" height="160" class="d-inline-block align-text-top" style="filter: brightness(0) invert(1);"><br><br>
    <h1 class="display-5 fw-bold text-white">SPC ONLINE CAFETERIA</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4 text-white"><strong>Welcome to the SPC Online Cafeteria, where delicious meals are just a click away!</strong></p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center  px-3 py-5">
        <a href="mainpage" class=" btn-cta text-decoration-none text-white me-5  gap-3 font-weight-bold">Order Now</a>
        <a href="adminlogin" class="btn-cta text-decoration-none text-white btn-lg  font-weight-bold">Admin</a>
      </div>
    </div>
  </div>
</main>
    @endsection
