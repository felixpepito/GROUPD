document.addEventListener('DOMContentLoaded', function() {
    // Function to handle click on a product item
    function handleProductClick(event) {
        // Check if the clicked element is a product item
        if (event.target.classList.contains('menu-item')) {
            // Get the product name and price
            const productName = event.target.querySelector('.php:nth-child(2)').textContent.trim();
            const productPrice = parseFloat(event.target.querySelector('.php:nth-child(1)').textContent.trim().replace('₱', ''));

            // Add the product to the order list
            addToOrderList(productName, productPrice);
        }
    }

    // Function to add a product to the order list
    function addToOrderList(name, price) {
        // Create a new list item
        const listItem = document.createElement('li');
        listItem.textContent = `${name} - ₱${price.toFixed(2)}`;

        // Append the new list item to the order list
        const orderList = document.querySelector('.order-list');
        orderList.appendChild(listItem);

        // Update the total price
        updateTotalPrice(price);
    }

    // Function to update the total price
    function updateTotalPrice(price) {
        // Get the current total price
        const totalPriceElement = document.querySelector('.total');
        let totalPrice = parseFloat(totalPriceElement.textContent.trim().replace('Total: ₱', ''));

        // Add the price of the selected product to the total
        totalPrice += price;

        // Update the total price element
        totalPriceElement.textContent = `Total: ₱${totalPrice.toFixed(2)}`;
    }

    // Attach click event listener to the menu container
    const menuContainer = document.querySelector('.menu-container');
    menuContainer.addEventListener('click', handleProductClick);
});
