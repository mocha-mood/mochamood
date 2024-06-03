
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


function formatProductName(productName) {
    return productName.toLowerCase().replace(/\s+/g, '-') + '.webp';
}

function displayProducts(products, containerId) {
    const productList = document.getElementById(containerId);
    productList.innerHTML = ''; 
    if (products.length === 0) {
        productList.innerHTML = '<p>No products found.</p>';
        return;
    }

    products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.className = 'product';
        const imageName = formatProductName(product.product_name);
        productDiv.innerHTML = `
            <img src="images/${imageName}" alt="${product.product_name}">
            <h2>${product.product_name}</h2>
            <p>Price: €${product.price} ${product.currency}</p>
        `;
        productList.appendChild(productDiv);
    });
}


document.addEventListener('DOMContentLoaded', async () => {
    const products = await fetchProducts();
    displayProducts(products, 'product-list');
})