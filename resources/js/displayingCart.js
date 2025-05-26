document.addEventListener("DOMContentLoaded", function () {
    let cart = JSON.parse(localStorage.getItem('products')) || [];
    const csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const baseImageUrl = window.baseImageUrl; // Blade-passed image path
    const loggedInUser = window.loggedUser;

    // Load cart from DB if user is logged in
    function loadCartFromDb() {
        if (loggedInUser) {
            fetch('/cart/products')
                .then(response => response.json())
                .then(products => {
                    cart = products.map(item => ({
                        productId: item.product.id,
                        productName: item.product.name,
                        productDescription: item.product.description,
                        productImage: item.product.image,
                        productQuantity: item.quantity,
                        productPrice: item.product.price
                    }));

                    renderCart();      // Render updated cart
                    calTotalPrice();   // Update total price
                });
        }
    }

    // Render cart UI
    function renderCart() {
        let html = '';
        const countElement = document.querySelector('.cart-count');
        const noItem = document.getElementById("no-item");

        if (cart.length === 0) {
            html = `<p>No item in the cart</p>`;
            countElement.innerHTML = 0;
            noItem.innerHTML = 0;
        } else {
            const totalQuantity = cart.reduce((acc, item) => acc + Number(item.productQuantity), 0);
            countElement.innerHTML = totalQuantity;
            noItem.innerHTML = totalQuantity;

            cart.forEach(product => {
                const price = Number(product.productPrice) * Number(product.productQuantity);
                html += `
                <div class="cart-item row align-items-center border-bottom py-2">
                    <div class="col-3">
                        <img src="${baseImageUrl}/${product.productImage}" alt="">
                    </div>
                    <div class="col-4">
                        <h5>${product.productName}</h5>
                        <p>${product.productDescription}</p>
                    </div>
                    <div class="col-2">
                        <p>${price}</p>
                    </div>
                    <div class="col-3 d-flex align-items-center flex-column">
                        <div class="d-flex mb-2">
                            <button class="btn btn-outline-secondary qtyAdd" data-id="${product.productId}">+</button>
                            <input type="text" class="form-control mx-2 text-center" value="${product.productQuantity}" disabled>
                            <button class="btn btn-outline-secondary qtyMinus" data-id="${product.productId}">-</button>
                        </div>
                        <button class="btn btn-outline-primary btn-sm removeProduct" data-id="${product.productId}">Remove</button>
                    </div>
                </div>`;
            });
        }

        document.getElementById('cartContainer').innerHTML = html;
        attachEventListeners();
        calTotalPrice();
    }

    // Calculate and show total price
    function calTotalPrice() {
        const totalPrice = cart.reduce((acc, item) => acc + (item.productPrice * item.productQuantity), 0);

        document.querySelectorAll('#totalPrice').forEach(el => {
            el.innerHTML = totalPrice.toFixed(2);
        });

        const summaryCard = document.querySelector(".summary-card");
        if (summaryCard) {
            summaryCard.style.display = totalPrice === 0 ? "none" : "block";
        }
    }

    // Attach all button listeners after rendering
    function attachEventListeners() {
        document.querySelectorAll(".qtyAdd").forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.dataset.id;

                if (loggedInUser) {
                    fetch(`/cart/update/${id}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrf_token
                        },
                        body: JSON.stringify({ change: 1 })
                    }).then(() => loadCartFromDb());
                } else {
                    let item = cart.find(p => p.productId === id);
                    if (item) {
                        item.productQuantity += 1;
                        localStorage.setItem('products', JSON.stringify(cart));
                        renderCart();
                    }
                }
            });
        });

        document.querySelectorAll(".qtyMinus").forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.dataset.id;

                if (loggedInUser) {
                    fetch(`/cart/update/${id}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrf_token
                        },
                        body: JSON.stringify({ change: -1 })
                    }).then(() => loadCartFromDb());
                } else {
                    let item = cart.find(p => p.productId === id);
                    if (item) {
                        item.productQuantity -= 1;
                        if (item.productQuantity <= 0) {
                            cart = cart.filter(p => p.productId !== id);
                        }
                        localStorage.setItem('products', JSON.stringify(cart));
                        renderCart();
                    }
                }
            });
        });

        document.querySelectorAll(".removeProduct").forEach(btn => {
            btn.addEventListener('click', function () {
                const productId = this.dataset.id;

                if (loggedInUser) {
                    fetch(`/cart/delete/${productId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrf_token
                        }
                    }).then(() => loadCartFromDb());
                } else {
                    cart = cart.filter(p => p.productId !== productId);
                    localStorage.setItem('products', JSON.stringify(cart));
                    renderCart();
                }
            });
        });
    }

    // Load cart either from DB or localStorage
    if (loggedInUser) {
        loadCartFromDb();
    } else {
        renderCart();
    }
});
