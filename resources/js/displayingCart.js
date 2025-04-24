document.addEventListener("DOMContentLoaded", function () {
    let cart = JSON.parse(localStorage.getItem('products')) || [];
    const csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const baseImageUrl = window.baseImageUrl; //accessing image url from laravel blade
    const loggedInUser =  window.loggedUser; //logged in user
    // console.log(loggedInUser);
    // let a =1;
   function loadCartFromDb(){
    if(loggedInUser){
        fetch('/cart/products')    
                .then(response => response.json())
                .then(products =>{
                    cart = products.map(item=> ({
                        productId: item.product.id,
                        productName: item.product.name,
                        productDescription: item.product.description,
                        productImage: item.product.image,
                        productQuantity: item.quantity,
                        productPrice: item.product.price
                    }));

                    renderCart(); // show cart from DB
                })
    }
   }
   loadCartFromDb(); //reading cart ites from db for logged in user.....->umar


    function renderCart() {
        let html = '';
        // let totalQuantity = 0;

        let countElement = document.querySelector('.cart-count');
        let noItem = document.getElementById("no-item"); //number of items


        if (cart.length === 0) {
            html = `<p>No item in the cart</p>`;
        } else {
            // calculating totalQuantity
            let totalQuantity = cart.reduce((acc,item)=>{ return acc + Number(item.productQuantity)},0);
            countElement.innerHTML = totalQuantity;
            noItem.innerHTML = totalQuantity;

            cart.forEach(product => {
                let price = Number(product.productPrice) * Number(product.productQuantity);
                // displaying cart items
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
                            <input type="text" class="form-control mx-2 text-center" value="${product.productQuantity}">
                            <button class="btn btn-outline-secondary qtyMinus" data-id="${product.productId}">-</button>
                        </div>
                        <button class="btn btn-outline-primary btn-sm" id="removeProduct" data-id="${product.productId}">Remove</button>
                    </div>
                </div>`;
            });
        }
        document.getElementById('cartContainer').innerHTML = html;
        attachEventListeners(); // Re-attach event listeners after rendering cart
    }

    function attachEventListeners() {
        // Adding quantity
        document.querySelectorAll(".qtyAdd").forEach(btn => {
            btn.addEventListener('click', function () {
                let id = this.dataset.id;

                if(loggedInUser){
                    fetch(`/cart/update/${id}`,{
                        method : 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN':csrf_token 
                        },
                        body: JSON.stringify({ change: 1 })
                    })
                    .then( () =>loadCartFromDb());
                }else{
                    let item = cart.find(product => product.productId === id);
                    if (item) {
                        item.productQuantity += 1;
                        // item.productPrice = parse(item.productPrice + item.productPrice);
                        localStorage.setItem('products', JSON.stringify(cart));
                        renderCart(); // Refresh the DOM after updating the cart
                    }
                }
                
            });
        });

        // Subtracting quantity
        document.querySelectorAll(".qtyMinus").forEach(btn => {
            btn.addEventListener('click', function () {
                let id = this.dataset.id;

                if(loggedInUser){
                    fetch(`/cart/update/${id}`,{
                        method : 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrf_token 
                        },
                        body: JSON.stringify({ change: -1 })
                    })
                    .then(() => loadCartFromDb());
                }else{
                    let item = cart.find(product => product.productId === id);
                    if (item) {
                        item.productQuantity -= 1;
                        if (item.productQuantity <= 0) {
                            cart = cart.filter(p => p.productId !== id); // Remove the product if quantity is 0
                        }
                        localStorage.setItem('products', JSON.stringify(cart));
                        renderCart(); // Refresh the DOM after updating the cart
                    }
                 }
            });
        });

        // Removing item from cart
        document.querySelectorAll("#removeProduct").forEach(btn => {
            btn.addEventListener('click', function() {
                let productId = this.dataset.id;
                if(loggedInUser){
                    fetch(`/cart/delete/${productId}`,{
                        method : 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrf_token 
                        }
                    })
                        .then(()=>loadCartFromDb());
                }else{
                    cart = cart.filter(p => p.productId !== productId); // Remove item from the cart
                    localStorage.setItem('products', JSON.stringify(cart));
                    renderCart(); // Refresh the DOM after item removal
                }
                
            });
        });

            // total price for all product
            let totalPrice = cart.reduce((acc,item)=>{ return acc + (item.productPrice * item.productQuantity)},0);

            document.querySelectorAll('#totalPrice').forEach(element => {
                element.innerHTML = totalPrice;
            });
            if(totalPrice == 0){
                document.querySelector(".summary-card").style.display = "none";
            }
            // console.log(totalPrice);
    }



    renderCart(); // Initial render of the cart when the page loads-> umar
});