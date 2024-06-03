// Function to fetch JSON data
async function fetchProducts() {
    try {
        const response = await fetch('http://tietokanta.dy.fi:8000/mochamood/jsonformat.php');
        const products = await response.json();
        return products;
    } catch (error) {
        console.error('Error fetching products:', error);
        return [];
    }
}

// Function to display products in the HTML
function displayProducts(products, containerId) {
    const productList = document.getElementById(containerId);
    productList.innerHTML = ''; // Clear existing content

    if (products.length === 0) {
        productList.innerHTML = '<p>No products found.</p>';
        return;
    }

    products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.className = 'product';
        productDiv.innerHTML = `
            <h2>${product.name}</h2>
            <p>Price: $${product.price}</p>
            <p>Description: ${product.description}</p>
        `;
        productList.appendChild(productDiv);
    });
}

// Fetch and display products when the page loads
document.addEventListener('DOMContentLoaded', async () => {
    const products = await fetchProducts();
    displayProducts(products, 'product-list');
});