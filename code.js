document.addEventListener('DOMContentLoaded', () => {
    const orderCodeDiv = document.getElementById('order-code');

    function generateCode() {
        return Math.floor(1000 + Math.random() * 9000).toString();
    }

    function displayOrderCode() {
        const orderCode = generateCode();
        orderCodeDiv.textContent = orderCode;

        // Send the order code to the backend
        const orderData = {
            user_id: 123, 
            order_code: orderCode,
        };

        fetch('/place_order', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(orderData)
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                alert('Failed to place order. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error placing order:', error);
            alert('An error occurred. Please try again later.');
        });
    }

    displayOrderCode();
});
