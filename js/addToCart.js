// JavaScript to handle the click event and add to cart
document.addEventListener('DOMContentLoaded', function () {
    var addToCartButtons = document.querySelectorAll('.add-to-cart');

    addToCartButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            // Get pizza details from the data attributes
            var pizzaId = this.getAttribute('data-id');
            var pizzaName = this.getAttribute('data-name');
            var pizzaPrice = this.getAttribute('data-price');

            // Send the pizza details to the server using AJAX
            addToCart({
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
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
}