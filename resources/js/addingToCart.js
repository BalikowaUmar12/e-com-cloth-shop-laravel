document.addEventListener('DOMContentLoaded',()=>{
    let products = JSON.parse(localStorage.getItem('products')) || [];

    let countElement = document.querySelector('.cart-count');
    // countElement.innerHTML = 0;
    function displayCount(){        //function to display count
        let totalQuantity = products.reduce((acc,product)=>{ return acc + product.productQuantity;},0)
        countElement.innerHTML = totalQuantity;
    }
    displayCount()

    function addToCart(){
        document.querySelectorAll("#addToCart").forEach(btn =>{
            btn.addEventListener('click', function(){
               
                const productId = this.getAttribute('data-id');
                const productName = this.getAttribute('data-name');
                const productPrice = this.getAttribute('data-price');
        
                let product = {
                    'productId'  : productId,
                    'productName' : productName,
                    'productPrice' : productPrice,
                    'productQuantity' : 1
                }
               
                //checking if product exits in array products and update  its quantity and price 
                let isExisting = products.find(existingProduct => existingProduct.productId === product.productId);
                if(isExisting){
                    isExisting.productQuantity += 1;
                    // isExisting.productPrice = Number(isExisting.productPrice) + Number(productPrice);
                }else{
                    products.push(product);
                }
                localStorage.setItem('products',JSON.stringify(products));
    
                displayCount() //display count after adding item... 
            });
        });
   
    }
   addToCart(); //initial add to cart
  });