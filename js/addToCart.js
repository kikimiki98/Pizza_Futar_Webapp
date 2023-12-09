// JavaScript to handle the click event and add to cart
document.addEventListener('DOMContentLoaded', function () {
    var addToCartButtons = document.querySelectorAll('.add-to-cart');

    addToCartButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            // Get pizza details from the data attributes
            var pizzaImg = this.getAttribute('data-img');
            var pizzaId = this.getAttribute('data-id');
            var pizzaName = this.getAttribute('data-name');
            var pizzaPrice = this.getAttribute('data-price');

            // Send the pizza details to the server using AJAX
            addToCart({
                image: pizzaImg,
                id: pizzaId,
                name: pizzaName,
                price: pizzaPrice
            });

            // You can update the UI or show a confirmation message here
            console.log('Added to cart:', pizzaName);
        });
    });
});

// addToCart.js

function addToCart(pizza) {
    // Your implementation here
    console.log('Adding to cart:', pizza);

    // Example AJAX request using jQuery
    $.ajax({
        type: 'POST',  // or 'GET' depending on your server-side logic
        url: 'addToCart.php',  // replace with the actual URL of your server-side script
        data: pizza,
        success: function(response) {
            console.log('Server response:', response);
            // You can update the UI or perform additional actions here

            // Update the "fa badge" value
            var currentBadgeValue = parseInt(document.querySelector('.fa.badge').getAttribute('value'));
            document.querySelector('.fa.badge').setAttribute('value', currentBadgeValue + 1);
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
}

function emptyCart() {
    // Send an AJAX request to clear the cart on the server side
    $.ajax({
        type: 'POST',
        url: 'emptyCart.php',  // replace with the actual URL of your server-side script
        success: function(response) {
            console.log('Server response:', response);
            
            // Update the "fa badge" value to 0
            document.querySelector('.fa.badge').setAttribute('value', 0);

            // You can perform additional UI updates or actions here
            location.reload();
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
}

function checkout() {
    // Send an AJAX request to the server to process the order
    $.ajax({
        type: 'POST',
        url: 'checkoutProcess.php',  // replace with the actual URL of your server-side script
        success: function(response) {
            console.log('Server response:', response);

            // Open a modal window or redirect to another page with the order details
            showModal(response);
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
}

function showModal(orderDetails) {
    // Customize this function to display a modal window
    // You can use a library like Bootstrap or create a custom modal
    alert('Order Completed!\n\n' + orderDetails);
}



