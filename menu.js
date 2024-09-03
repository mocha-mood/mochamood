// Global cart array to store selected products
let cart = [];

// FETCH AND DISPLAY PRODUCTS
async function fetchProducts() {
    try {
        const response = await fetch('http://tietokanta.dy.fi:8000/mochamood/jsonformat.php');
        const products = await response.json();
        console.log('Fetched products:', products);
        return products;
    } catch (error) {
        console.error('Error fetching products:', error);
        return [];
    }
}

function categorizeProducts(products) {
    return products.map(product => {
        if (product.product_name.toLowerCase().includes('coffee') || 
            product.product_name.toLowerCase().includes('cappuccino') ||
            product.product_name.toLowerCase().includes('espresso') ||
            product.product_name.toLowerCase().includes('latte')) {
            product.category = 'coffee';
        } else {
            product.category = 'snack';
        }
        return product;
    });
}

function displayProductsByCategory(products, category = 'all') {
    const allList = document.getElementById('all-list');
    const coffeeList = document.getElementById('coffee-list');
    const snackList = document.getElementById('snack-list');
    const imageBasePath = 'http://tietokanta.dy.fi:8000/mochamood/images/';

    allList.innerHTML = '';
    coffeeList.innerHTML = '';
    snackList.innerHTML = '';

    const coffees = products.filter(product => product.category === 'coffee');
    const snacks = products.filter(product => product.category === 'snack');
    const allProducts = [...coffees, ...snacks];

    const displayList = category === 'all' ? allProducts : (category === 'coffee' ? coffees : snacks);

    if (displayList.length === 0) {
        const listToUse = category === 'all' ? allList : (category === 'coffee' ? coffeeList : snackList);
        listToUse.innerHTML += `<p>No ${category} found.</p>`;
    } else {
        displayList.forEach(product => {
            const productDiv = document.createElement('div');
            productDiv.className = 'product box zone';
            const imageUrl = imageBasePath + product.image;
            productDiv.innerHTML = `
                <div class="product-image">
                    <img src="${imageUrl}" alt="${product.product_name}">
                </div>
                <div class="product-details">
                    <h6>${product.product_name}</h6>
                    <p>Price: €${product.price} ${product.currency}</p>
                    <button class="add-to-cart-btn">Add to Cart</button>
                </div>
            `;

            productDiv.addEventListener('click', (event) => {
                event.stopPropagation();
                if (product.category === 'coffee') {
                    toggleProductOptions(product, productDiv);
                }
            });

            productDiv.querySelector('.add-to-cart-btn').addEventListener('click', (event) => {
                event.stopPropagation();
                const optionsContainer = productDiv.querySelector('.product-options');
                addToCart(product, optionsContainer);
            });

            if (category === 'all') {
                allList.appendChild(productDiv);
            } else if (category === 'coffee') {
                coffeeList.appendChild(productDiv);
            } else {
                snackList.appendChild(productDiv);
            }
        });
    }
}

function toggleProductOptions(product, productDiv) {
    const existingOptions = productDiv.querySelector('.product-options');
    if (existingOptions) {
        existingOptions.remove();
        return;
    }

    const optionsContainer = document.createElement('div');
    optionsContainer.className = 'product-options';
    optionsContainer.innerHTML = `
        <fieldset>
            <legend>Choose coffee size for ${product.product_name}</legend>
            <input type="radio" id="large-${product.product_id}" name="coffeeSize-${product.product_id}" value="large">
            <label for="large-${product.product_id}">Large</label>

            <input type="radio" id="medium-${product.product_id}" name="coffeeSize-${product.product_id}" value="medium">
            <label for="medium-${product.product_id}">Medium</label>

            <input type="radio" id="small-${product.product_id}" name="coffeeSize-${product.product_id}" value="small">
            <label for="small-${product.product_id}">Small</label><br />
        </fieldset>
        <fieldset>
            <legend>Decide the sweetness of your coffee</legend>
            <input type="radio" id="sugar100-${product.product_id}" name="sugarQuantity-${product.product_id}" value="100%">
            <label for="sugar100-${product.product_id}">100%</label>

            <input type="radio" id="sugar50-${product.product_id}" name="sugarQuantity-${product.product_id}" value="50%">
            <label for="sugar50-${product.product_id}">50%</label>

            <input type="radio" id="sugar25-${product.product_id}" name="sugarQuantity-${product.product_id}" value="25%">
            <label for="sugar25-${product.product_id}">25%</label>
        </fieldset>
        <fieldset>
            <legend>What milk would you prefer?</legend>
            <input type="radio" id="oat-${product.product_id}" name="milk-${product.product_id}" value="oat">
            <label for="oat-${product.product_id}">Oat Milk</label>

            <input type="radio" id="diary-${product.product_id}" name="milk-${product.product_id}" value="diary">
            <label for="diary-${product.product_id}">Dairy Milk</label>
        </fieldset><br><br>
    `;

    optionsContainer.addEventListener('click', (event) => {
        event.stopPropagation();
    });

    productDiv.appendChild(optionsContainer);
}

function hideProductOptions() {
    const allOptionsContainers = document.querySelectorAll('.product-options');
    allOptionsContainers.forEach(container => {
        container.remove();
    });
}

function showCategory(category) {
    const allList = document.getElementById('all-list');
    const coffeeList = document.getElementById('coffee-list');
    const snackList = document.getElementById('snack-list');

    if (category === 'all') {
        allList.style.display = 'grid';
        coffeeList.style.display = 'none';
        snackList.style.display = 'none';
    } else if (category === 'coffee') {
        allList.style.display = 'none';
        coffeeList.style.display = 'grid';
        snackList.style.display = 'none';
    } else if (category === 'snack') {
        allList.style.display = 'none';
        coffeeList.style.display = 'none';
        snackList.style.display = 'grid';
    }
}

function filterProducts(products, query) {
    const filteredProducts = products.filter(product => 
        product.product_name.toLowerCase().includes(query.toLowerCase())
    );
    displayProductsByCategory(filteredProducts);
}

document.addEventListener('DOMContentLoaded', async () => {
    let products = await fetchProducts();
    products = categorizeProducts(products); 
    displayProductsByCategory(products, 'all'); 

    showCategory('all');

    const searchInput = document.getElementById('search');
    searchInput.addEventListener('input', () => {
        filterProducts(products, searchInput.value);
    });

    document.getElementById('show-all').addEventListener('click', () => {
        displayProductsByCategory(products, 'all');
        showCategory('all');
    });
    document.getElementById('show-coffees').addEventListener('click', () => {
        displayProductsByCategory(products, 'coffee');
        showCategory('coffee');
    });

    document.getElementById('show-snacks').addEventListener('click', () => {
        displayProductsByCategory(products, 'snack');
        showCategory('snack');
    });

    document.addEventListener('click', (event) => {
        const isClickInside = event.target.closest('.product.box.zone');
        if (!isClickInside) {
            hideProductOptions();
        }
    });
});

function addToCart(product, optionsContainer = null) {
    let customizedProduct = { ...product, quantity: 1 }; 

    if (product.category === 'coffee' && optionsContainer) {
        const size = optionsContainer.querySelector(
            `input[name="coffeeSize-${product.product_id}"]:checked`
        )?.value;
        const sugar = optionsContainer.querySelector(
            `input[name="sugarQuantity-${product.product_id}"]:checked`
        )?.value;
        const milk = optionsContainer.querySelector(
            `input[name="milk-${product.product_id}"]:checked`
        )?.value;

        if (!size || !sugar || !milk) {
            alert('Please select all options before adding to cart.');
            return;
        }

        
        customizedProduct = { ...customizedProduct, size, sugar, milk };
    }

    
    const existingProductIndex = cart.findIndex(
        (item) =>
            item.product_id === customizedProduct.product_id &&
            item.size === customizedProduct.size &&
            item.sugar === customizedProduct.sugar &&
            item.milk === customizedProduct.milk
    );

    if (existingProductIndex > -1) {
        cart[existingProductIndex].quantity += 1;
    } else {
        cart.push(customizedProduct);
    }

    console.log('Cart before saving to localStorage:', cart);
    localStorage.setItem('cart', JSON.stringify(cart));

    updateCartCount();
    showCheckoutIcon();
}


function showCheckoutIcon() {
    const checkoutIcon = document.querySelector('.cart_icon');
    if (checkoutIcon) {
        checkoutIcon.style.display = 'block';
    }
}

function updateCartCount() {
    const cartCount = document.getElementById('cart-count');
    if (cartCount) {
        cartCount.textContent = cart.length;
    }
}


document.querySelector('.cart_icon').addEventListener('click', () => {
    window.location.href = 'checkout.php';
});
