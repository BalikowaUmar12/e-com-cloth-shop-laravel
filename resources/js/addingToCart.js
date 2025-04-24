document.addEventListener('DOMContentLoaded',()=>{
  
    const loggedInUser =  window.loggedUser; //logged in user

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
                const description = this.getAttribute('data-description');
                const image = this.getAttribute('data-image');
        
                let product = {
                    'productId'  : productId,
                    'productName' : productName,
                    'productPrice' : productPrice,
                    'productDescription' : description,
                    'productImage' : image,
                    'productQuantity' : 1
                }
            //    console.log(csrf_token);
                // let a = 1
                // console.log(loggedInUser);
                if(loggedInUser){
                    const csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch('/addToCart', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrf_token,
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify(product)
                    })
                    .then(res => res.json())
                    .then(data => console.log(data))
                    .catch(err => console.error('Error:', err));
                    
                }else{
                      //checking if product exits in array products and update  its quantity and price 
                    let isExisting = products.find(existingProduct => existingProduct.productId === product.productId);
                    if(isExisting){
                        isExisting.productQuantity += 1;
                        // isExisting.productPrice = Number(isExisting.productPrice) + Number(productPrice);
                    }else{
                        products.push(product);
                    }
                    localStorage.setItem('products',JSON.stringify(products));
                }
              
    
                displayCount() //display count after adding item... 
            });
        });
   
    }
   addToCart(); //initial add to cart
  });