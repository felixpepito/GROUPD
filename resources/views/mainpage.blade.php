@extends('layouts.main')

@section('content')
    <div class="menu-container">
        @foreach ($products as $product)
            <div class="menu-item" onclick="addToOrder('{{ $product->Product_NAME }}', '{{ $product->Product_PRICE }}', '{{ asset('img/'. $product->Image_Name) }}')">
                <img class="fried-chicken" src="{{ asset('img/'. $product->Image_Name) }}" alt="Fried Chicken">
                <p class="php">₱ {{ $product->Product_PRICE }}</p>
                <p class="php">{{ $product->Product_NAME }}</p>
            </div>
        @endforeach
        <div class="Order-Menu d-flex flex-column justify-content-between py-5 px-3" id="order-menu">
            <div class="order">
                <h2>ORDER MENU</h2>
                <table class="order-table">
                    <thead>
                        <tr>
                            <th class="mx-3">|Item|</th>
                            <th class="mx-3">Price|</th>
                            <th class="mx-3">Quantity|</th> 
                            <th class="mx-3"></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="order-list">
                    </tbody>    
                </table>
            </div>
             <footer class="order-footer d-flex justify-content-between align-items-center mt-4 p-3" style="background-color: #f8f9fa;">
                <a class="btn-danger btn px-4 text-decoration-none text-white" style="position:absolute; left:83%; top:10%; transform:translate(-50%,-50%);" href="{{ url('/home') }}" role="button">Home</a>
                <a class="btn-danger btn py-2  px-3   text-decoration-none text-white" href="{{ url('/customerdetails') }}" onclick="validateOrder(event)" role="button">Order</a><br><br><br><br>
                <p class="total  mt-3" style="left:60%;top:80%;">Total: ₱<span id="total-price">0.00</span></p>
            </footer>
        </div>
    </div>
    <script>
    function addToOrder(name, price, imageUrl) {
        var orderList = document.querySelector('.order-list');
        var totalPriceElement = document.getElementById('total-price');
        var existingRow = Array.from(orderList.rows).find(row => row.cells[0].textContent === name);

        if (existingRow) {
            var quantityCell = existingRow.cells[2];
            var quantity = parseInt(quantityCell.textContent) + 1;
            quantityCell.textContent = quantity;
        } else {
            var newRow = orderList.insertRow();
            var nameCell = newRow.insertCell(0);
            var priceCell = newRow.insertCell(1);
            var quantityCell = newRow.insertCell(2);
            var imageCell = newRow.insertCell(3);
            var actionCell = newRow.insertCell(4);

            nameCell.textContent = name;
            priceCell.textContent = '₱' + price;
            quantityCell.textContent = 1;
            imageCell.innerHTML = '<img src="' + imageUrl + '" alt="' + name + '" style="width: 50px; height: 50px;">';

            var deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            deleteButton.classList.add('delete-button');
            deleteButton.onclick = function() {
                var rowToDelete = this.parentNode.parentNode;
                var itemPrice = parseFloat(rowToDelete.cells[1].textContent.replace('₱', ''));
                var itemQuantity = parseInt(rowToDelete.cells[2].textContent);
                orderList.removeChild(rowToDelete);
                updateTotalPrice(-(itemPrice * itemQuantity));
            };

            actionCell.appendChild(deleteButton);
        }

        updateTotalPrice(parseFloat(price));
    }

    function updateTotalPrice(price) {
        var totalPriceElement = document.getElementById('total-price');
        var totalPrice = parseFloat(totalPriceElement.textContent) + parseFloat(price);
        totalPriceElement.textContent = totalPrice.toFixed(1);
    }

   
    function validateOrder(event) {
    var orderList = document.querySelector('.order-list');

    if (orderList.rows.length === 0) {
        event.preventDefault();
        alert('Please add items to your order.');
    } else {
        var orderItems = [];
        Array.from(orderList.rows).forEach(row => {
            var itemName = row.cells[0].textContent;
            var itemPrice = parseFloat(row.cells[1].textContent.replace('₱', ''));
            var itemQuantity = parseInt(row.cells[2].textContent);
            orderItems.push({ name: itemName, price: itemPrice, quantity: itemQuantity });
        });

        fetch('/placeorder', { // Change to the correct route for placing orders
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ order_items: orderItems })
        })
        .then(response => {
            if (response.ok) {
                return response.json(); // Parse the JSON response
            } else {
                throw new Error('Failed to place order. Server responded with status ' + response.status);
            }
        })
        .then(data => {
            // Check if the server returned any specific error message
            if (data && data.error) {
                throw new Error(data.error);
            } else {
                alert('Order placed successfully!');
                window.location.href = '{{ url('/customerdetails') }}';
            }
        })
        .catch(error => {
            console.error('Order placement error:', error);
            alert('Failed to place order. Please try again.');
        });
    }
}
</script>

@endsection
