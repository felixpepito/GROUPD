<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE CAFETERIA</title>
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/customer.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/cart.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/order.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/menu.css')}}" rel="stylesheet" />
    
</head>
<body>
    @yield('navbar')
    <nav class="navbar bg-white">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div>
                <img src="{{ asset('img/spclogo.png')}}" alt="Logo" width="200" height="70" class="d-inline-block align-text-top">
            </div>
            <div>
                <h1 class="display-3 ml-4 mb-0 "style="position:absolute; left:32%;  top:40%; transform:translate(-50%,-50%);">ONLINE CAFETERIA</h1>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="container mt-4">
        @yield('extra')
    </div>

    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
