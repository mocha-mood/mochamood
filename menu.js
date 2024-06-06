//FETCH AND DISPLAY PRODUCTS
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

function displayProducts(products, containerId) {
    const productList = document.getElementById(containerId);
    const imageBasePath = 'http://tietokanta.dy.fi:8000/mochamood/images/'; 

    productList.innerHTML = ''; 

    if (products.length === 0) {
        productList.innerHTML = '<p>No products found.</p>';
        return;
    }

    products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.className = 'product box zone';
        const imageUrl = imageBasePath + product.image;
        productDiv.innerHTML = `
            <img src="${imageUrl}" alt="${product.product_name}">
            <h2>${product.product_name}</h2>
            <p>Price: €${product.price} ${product.currency}</p>
        `;
        productList.appendChild(productDiv);
    });
}

// SEARCH BOX FUNCTION

function filterProducts(products, query) {
    const filteredProducts = products.filter(product => 
        product.product_name.toLowerCase().includes(query.toLowerCase())
    );
    displayProducts(filteredProducts, 'product-list');
}

document.addEventListener('DOMContentLoaded', async () => {
    const products = await fetchProducts();
    displayProducts(products, 'product-list');

    const searchInput = document.getElementById('search');
    searchInput.addEventListener('input', () => {
        filterProducts(products, searchInput.value);
    });
});



