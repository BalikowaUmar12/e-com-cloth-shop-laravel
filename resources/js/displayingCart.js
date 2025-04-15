document.addEventListener("DOMContentLoaded", function () {
    let cart = JSON.parse(localStorage.getItem('products')) || [];

    // getting total quantity
    // let totalQuantity = cart.reduce((acc,item)=>{ return acc + item.productQuantity},0);
    // console.log(totalQuantity);

    function renderCart() {
        let html = '';
        let totalQuantity = '';

        let countElement = document.querySelector('.cart-count');
        let noItem = document.getElementById("no-item"); //number of items
       

        if (cart.length === 0) {
            html = `<p>No item in the cart</p>`;
        } else {
            cart.forEach(product => {
                 // getting total quantity
                let totalQuantity = cart.reduce((acc,item)=>{ return acc + Number(item.productQuantity)},0);
                countElement.innerHTML = totalQuantity;
                noItem.innerHTML = totalQuantity;


                // displaying cart items
                html += `
                <div class="cart-item row align-items-center border-bottom py-2">
                    <div class="col-3">
                        <img src="" alt="">
                    </div>
                    <div class="col-4">
                        <h5>${product.productName}</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur.</p>
                    </div>
                    <div class="col-2">
                        <p>${product.productPrice}</p>
                    </div>
                    <div class="col-3 d-flex align-items-center flex-column">
                        <div class="d-flex mb-2">
                            <button class="btn btn-outline-secondary qtyAdd" data-id="${product.productId}">+</button>
                            <input type="text" class="form-control mx-2 text-center" value="${product.productQuantity}">
                            <button class="btn btn-outline-secondary qtyMinus" data-id="${product.productId}">-</button>
                        </div>
                        <button class="btn btn-outline-primary btn-sm" id="removeProduct" data-id="${product.productId}">Remove</button>
                    </div>
                </div>`;
            });
        }
        document.getElementById('cartContainer').innerHTML = html;
        attachEventListeners(); // Re-attach event listeners after rendering
    }

    function attachEventListeners() {
        // Adding quantity
        document.querySelectorAll(".qtyAdd").forEach(btn => {
            btn.addEventListener('click', function () {
                let id = this.dataset.id;
                let item = cart.find(product => product.productId === id);
                if (item) {
                    item.productQuantity += 1;
                    // item.productPrice = parse(item.productPrice + item.productPrice);
                    localStorage.setItem('products', JSON.stringify(cart));
                    renderCart(); // Refresh the DOM after updating the cart
                }
            });
        });

        // Subtracting quantity
        document.querySelectorAll(".qtyMinus").forEach(btn => {
            btn.addEventListener('click', function () {
                let id = this.dataset.id;
                let item = cart.find(product => product.productId === id);
                if (item) {
                    item.productQuantity -= 1;
                    if (item.productQuantity <= 0) {
                        cart = cart.filter(p => p.productId !== id); // Remove the product if quantity is 0
                    }
                    localStorage.setItem('products', JSON.stringify(cart));
                    renderCart(); // Refresh the DOM after updating the cart
                }
            });
        });

        // Removing item from cart
        document.querySelectorAll("#removeProduct").forEach(btn => {
            btn.addEventListener('click', function() {
                let productId = this.dataset.id;
                cart = cart.filter(p => p.productId !== productId); // Remove item from the cart
                localStorage.setItem('products', JSON.stringify(cart));
                renderCart(); // Refresh the DOM after item removal
            });
        });
    }

    renderCart(); // Initial render of the cart when the page loads
});