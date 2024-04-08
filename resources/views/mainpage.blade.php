@extends('layouts.main')

@section('extra')
    <div class="menu-container " >
        <div class="menu-item">
            <img class="fried-chicken" src="{{ asset('img/manok-1-CGd.png') }}" alt="Fried Chicken">
            <p>Fried Chicken</p><br>
            <p class="php">₱ 100</p>

        </div>
        <div class="menu-item">
          <img class="Sweet Spaghetti" src="{{ asset('img/pancit-1-MPs.png') }}" alt="Sweet Spaghetti">
          <p>Sweet Spaghetti</p><br>
          <p class="php">₱ 100</p>
      </div>

        <div class="menu-item">
            <img class="Pater Meal" src="{{ asset('img/rice-ang-subak-kay-dahon-sa-saging-1-cNq.png') }}" alt="Pater Meal">
            <p> Pater Meal</p><br>
            <p class="php">₱ 50</p>
        </div>

        <div class="menu-item">
          <img class="Pancit Guisado" src="{{ asset('img/-Y5K.png') }}" alt="Pancit Guisado">
          <p>Pancit Guisado</p><br>
          <p class="php">₱ 80</p>
      </div>

      <div class="menu-item">
        <img class="Fish Fillet" src="{{ asset('img/-UGV.png') }}" alt="Fish Fillet">
        <p>Fish Fillet</p><br>
        <p class="php">₱ 40</p>
      </div>

        <div class="menu-item">
            <img class="Coke Mismo" src="{{ asset('img/-j8h.png') }}" alt="Coke Mismo">
            <p>Coke Mismo</p><br>
            <p class="php">₱ 25</p>
        </div>

        <div class="menu-item">
          <img class="Sprite Mismo" src="{{ asset('img/image-1.png') }}" alt="Sprite Mismo">
          <p>Sprite Mismo</p><br>
          <p class="php">₱ 25</p>
      </div>
      <div class="menu-item">
        <img class="Bottled Water" src="{{ asset('img/-j65.png') }}" alt="Bottled Water">
        <p>Bottled Water</p><br>
        <p class="php">₱ 15 </p>
    </div>
        <div class="menu-item">
            <img class="Mountain Dew" src="{{ asset('img/image-2.png') }}" alt="Mountain Dew">
            <p>Mountain Dew</p><br>
            <p class="php">₱ 25</p>
        </div>
        <div class="menu-item">
            <img class="Gatorade" src="{{ asset('img/-YXF.png') }}" alt="Gatorade">
            <p>Gatorade</p><br>
            <p class="php">₱ 40</p>
        </div>

        <div class="menu-item">
            <img class="Fries" src="{{ asset('img/-ATP.png') }}" alt="Fries">
            <p>Fries</p><br>
            <p class="php">₱ 25</p>
        </div>
        <div class="menu-item">
            <img class="Tempura" src="{{ asset('img/-43P.png') }}" alt="Tempura">
            <p>Tempura</p><br>
            <p class="php">₱ 25</p>
        </div>
        <div class="menu-item">
            <img class="Siomai" src="{{ asset('img/dsadsaddad-1-hhF.png') }}" alt="Siomai">
            <p>Siomai</p><br>
            <p class="php">₱ 15</p>
        </div>
        <div class="menu-item">
            <img class="Siopao" src="{{ asset('img/dasdsadasdasd-1-snu.png') }}" alt="Siopao">
            <p>Siopao</p><br>
            <p class="php">₱ 25</p>
        </div>
        <div class="menu-item">
            <img class="Cookies" src="{{ asset('img/image-3.png') }}" alt="Cookies">
            <p>Cookies</p><br>
            <p class="php">₱ 25</p>

        </div>

    <div class="Order-Menu d-flex flex-column justify-content-between py-5 px-4">
        <div class="order">
            <h2>ORDER MENU</h2>
            <ul class="order-list">
                <!-- List items for order items -->
                <!-- Example: -->
                <li class="mt-5">Fried Chicken - ₱100</li>
                <!-- Add more list items for other menu items -->
            </ul>
        </div>


        <div class="d-flex gap-4 justify-between">

            <a class="btn btn-lg" href="{{ asset('customerdetails')}}" role="button">Order</a>
            <p class="total mt-4 d-flex flex-column justify-content-between py-4 px-4" style="position:absolute; right:15%; top:80%; transform:translate(-0%,-1%); ">Total: ₱100</p>


        </div>

    </div>
</div>
@endsection




