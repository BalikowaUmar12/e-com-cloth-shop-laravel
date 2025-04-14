document.addEventListener('DOMContentLoaded',()=>{
    let countElement = document.querySelector('.cart-count');
    countElement.innerHTML = 0;

    let products = JSON.parse(localStorage.getItem('products')) || [];

    document.querySelectorAll("#addToCart").forEach(btn =>{
        btn.addEventListener('click', function(){
            let cartCount = parseInt(countElement.innerHTML);
            countElement.innerHTML = cartCount +1;

            const productId = this.getAttribute('data-id');
            const productName = this.getAttribute('data-name');
            const productPrice = this.getAttribute('data-price');
    
            let product = {
                'productId'  : productId,
                'productName' : productName,
                'productPrice' : productPrice,
                'productQuantity' : 1
            }
           
            //checking if product exits in array products and update  its quantity
            let isExisting = products.find(existingProduct => existingProduct.productId === product.productId);
            if(isExisting){
                isExisting.productQuantity += 1;
            }else{
                products.push(product);
            }
            localStorage.setItem('products',JSON.stringify(products));

            // console.log(products);
        });
    });
   
  });