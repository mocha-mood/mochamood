// Initialize Stripe with your publishable key
const stripe = Stripe('pk_test_51PfpCxRprHu90u9ZkhCa0utsRf4ByBbXx8Mtc0BZZeb05jnOinoyMRjXMZfyWfkVTWg4fI73W6VJYai4ndohkFS500dI4tj6T4');

// Load cart items from localStorage
const cart = JSON.parse(localStorage.getItem('cart')) || [];
const cartItemsContainer = document.getElementById('cart-items');

// Function to display cart items and calculate total
function displayCartItems() {
    let total = 0;
    cartItemsContainer.innerHTML = ''; 

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
        return;
    }

    
    cart.forEach(product => {
        const quantity = product.quantity || 1;
        const price = parseFloat(product.price) || 0;

        total += price * quantity;

        
        const itemDiv = document.createElement('div');
        itemDiv.className = 'cart-item';
        itemDiv.innerHTML = `
            <p><strong>${product.product_name}</strong> x ${quantity}</p>
            <p>€${(price * quantity).toFixed(2)}</p>
            ${product.size ? `<p>Size: ${product.size}</p>` : ''}
            ${product.sugar ? `<p>Sugar: ${product.sugar}</p>` : ''}
            ${product.milk ? `<p>Milk: ${product.milk}</p>` : ''}
        `;
        cartItemsContainer.appendChild(itemDiv);
    });

    // Display the total amount
    const totalDiv = document.createElement('div');
    totalDiv.className = 'cart-total';
    totalDiv.innerHTML = `<p>Total: €${total.toFixed(2)}</p>`;
    cartItemsContainer.appendChild(totalDiv);
}

console.log('Cart loaded from localStorage:', cart);

// Display the cart items on page load
displayCartItems();

// Function to create the Stripe Checkout session
async function createCheckoutSession() {
    try {
        console.log("Cart items before creating Stripe Checkout session:", cart);

        // Create an array of line items to send to Stripe
        const lineItems = cart.map(product => {
            if (!product.stripe_price_id) {
                console.error('No stripe_price_id found for product:', product);
            }
            return {
                price: product.stripe_price_id,
                quantity: product.quantity || 1,
            };
        });

        console.log('Creating Checkout Session with Line Items:', lineItems);

        // Redirect to Stripe Checkout
        const response = await stripe.redirectToCheckout({
            lineItems: lineItems,
            mode: 'payment',
            successUrl: window.location.origin + '/mochamood/success.html',
            cancelUrl: window.location.origin + '/mochamood/menu.php',
        });

        if (response.error) {
            console.error('Error redirecting to Stripe Checkout:', response.error.message);
            alert(response.error.message);
        } else {
            localStorage.removeItem('cart'); 
        }
    } catch (error) {
        console.error('Error during Checkout Session creation:', error);
        alert('Unable to process payment. Please try again.');
    }
}


document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('checkout-button').addEventListener('click', createCheckoutSession);
    document.getElementById('cancel-button').addEventListener('click', () => {
        window.location.href = 'menu.php';
    });
});
