
const stripe = Stripe('pk_test_51PfpCxRprHu90u9ZkhCa0utsRf4ByBbXx8Mtc0BZZeb05jnOinoyMRjXMZfyWfkVTWg4fI73W6VJYai4ndohkFS500dI4tj6T4');


const cart = JSON.parse(localStorage.getItem('cart')) || [];
const cartItemsContainer = document.getElementById('cart-items');


function displayCartItems() {
    let total = 0;
    cartItemsContainer.innerHTML = ''; 

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
        return;
    }

    cart.forEach(product => {
        const quantity = product.quantity || 1;  
        const price = product.price || 0;  

        total += price * quantity;

        const itemDiv = document.createElement('div');
        itemDiv.className = 'cart-item';
        itemDiv.innerHTML = `
            <p>${product.product_name} x ${quantity}</p>
            <p>€${(price * quantity).toFixed(2)}</p>
        `;
        cartItemsContainer.appendChild(itemDiv);
    });

    const totalDiv = document.createElement('div');
    totalDiv.className = 'cart-total';
    totalDiv.innerHTML = `<p>Total: €${total.toFixed(2)}</p>`;
    cartItemsContainer.appendChild(totalDiv);
}


displayCartItems();


async function createCheckoutSession() {
    try {
        const lineItems = [{
            price: 'price_1PlomsRprHu90u9Z4znxX2BT', 
            quantity: 1,
        }];

        console.log('Creating Checkout Session with Line Items:', lineItems);

        const response = await stripe.redirectToCheckout({
            lineItems: lineItems,
            mode: 'payment',
            successUrl: window.location.origin + '/mochamood/success.html',
            cancelUrl: window.location.origin + '/mochamood/cancel.html',
        });

        if (response.error) {
            console.error('Error redirecting to Stripe Checkout:', response.error.message);
            alert(response.error.message);
        }
    } catch (error) {
        console.error('Error during Checkout Session creation:', error);
        alert('Unable to process payment. Please try again.');
    }
}

// Event listener for the checkout button
document.getElementById('checkout-button').addEventListener('click', () => {
    createCheckoutSession();
});
