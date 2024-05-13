@extends('layouts.main')

@section('content')
    <div class="menu-container">
        @foreach ($products as $product)
            <div class="menu-item" onclick="addToOrder('{{ $product->Product_NAME }}', '{{ $product->Product_PRICE }}')">
                <img class="fried-chicken" src="{{ asset('img/'. $product->Image_Name)  }}" alt="Fried Chicken">
                <p class="php">₱ {{ $product->Product_PRICE }}</p>
                <p class="php"> {{ $product->Product_NAME }}</p>
            </div>
        @endforeach
        <div class="Order-Menu d-flex flex-column justify-content-between py-5 px-3" id="order-menu">
            <div class="order">
                <h2>ORDER MENU</h2>
                <table class="order-table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th> <!-- Add a column for quantity -->
                            <th></th> <!-- Add a column for action -->
                        </tr>
                    </thead>
                    <tbody class="order-list">
                    </tbody>
                </table>
                
            </div>
            <div class="xd-flex gap-4 justify-between">
                <a class="btn-cta btn-lg text-decoration-none text-white mt-4 d-flex flex-column justify-content-between py-3 px-2" style="position:absolute; right:15%; top:0%; transform:translate(-0%,-1%);" href="{{ asset('home') }}" role="button">Home</a>
                <a class="btn-cta btn-lg text-decoration-none text-white" href="{{ asset('customerdetails') }}" role="button">Order</a>
                <p class="total mt-4 d-flex flex-column justify-content-between py-3 px-2" style="position:absolute; right:15%; top:80%; transform:translate(-0%,-1%);">Total: ₱<span id="total-price">0</span></p>
            </div>
        </div>
    </div>

    <script>
        function addToOrder(name, price) {
            // Find the order list, total price element, and order menu
            var orderList = document.querySelector('.order-list');
            var totalPriceElement = document.getElementById('total-price');
            var orderMenu = document.getElementById('order-menu');

            // Check if the item already exists in the order list
            var existingRow = null;
            for (var i = 0; i < orderList.rows.length; i++) {
                if (orderList.rows[i].cells[0].textContent === name) {
                    existingRow = orderList.rows[i];
                    break;
                }
            }

            if (existingRow) {
                // If the item already exists, update the quantity and total price
                var quantityCell = existingRow.cells[2];
                var quantity = parseInt(quantityCell.textContent) + 1;
                quantityCell.textContent = quantity;

                var totalPrice = parseFloat(totalPriceElement.textContent) + parseFloat(price);
                totalPriceElement.textContent = totalPrice.toFixed(2);
            } else {
                // If the item does not exist, create a new row
                var newRow = orderList.insertRow();
                var nameCell = newRow.insertCell(0);
                var priceCell = newRow.insertCell(1);
                var quantityCell = newRow.insertCell(2);
                var actionCell = newRow.insertCell(3);

                // Add the item name, price, quantity, and delete button to the new row
                nameCell.textContent = name;
                priceCell.textContent = '₱' + price;
                quantityCell.textContent = 1;

                // Create a delete button for the action cell
                var deleteButton = document.createElement('button');
                deleteButton.textContent = 'Delete';
                deleteButton.onclick = function() {
                    // Remove the corresponding row from the order list
                    orderList.deleteRow(newRow.rowIndex);
                    // Update the total price
                    var totalPrice = parseFloat(totalPriceElement.textContent) - parseFloat(price);
                    totalPriceElement.textContent = totalPrice.toFixed(2);
                    // Update the height of the order menu
                    updateOrderMenuHeight();
                };
                actionCell.appendChild(deleteButton);

                // Update the total price
                var totalPrice = parseFloat(totalPriceElement.textContent) + parseFloat(price);
                totalPriceElement.textContent = totalPrice.toFixed(2);
            }

            // Update the height of the order menu
            updateOrderMenuHeight();
        }

        function updateOrderMenuHeight() {
            // Find the order list and order menu elements
            var orderList = document.querySelector('.order-list');
            var orderMenu = document.getElementById('order-menu');

            // Calculate the height of the order menu based on the number of items
            var numRows = orderList.rows.length;
            var menuHeight = numRows * 50; // Assuming each row height is 50px

            // Set the height of the order menu and overflow
            orderMenu.style.height = 'auto'; // Reset height to auto
            var containerHeight = orderMenu.offsetHeight;
            if (menuHeight > containerHeight) {
                orderMenu.style.height = menuHeight + 'px';
            }
        }
    </script>
@endsection
