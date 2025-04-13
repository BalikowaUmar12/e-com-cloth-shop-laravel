@extends('layouts.main')
@section('content')

@include('layouts.homeTopBar')

<section class="bg-light text-dark py-5 text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Welcome to Cloth<span class="text-primary">shop</span></h1>
        <p class="lead">Discover stylish outfits for men, women, and kids. Affordable fashion that fits your lifestyle.</p>
        <a href="#" class="btn btn-primary btn-lg mt-3">Shop Now</a>
    </div>
</section>

<section class="mt-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Featured Products</h2>
            <a href="" class="btn btn-outline-primary text-center">View all</a>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 my-2">
                <div class="card ">
                    <img src="" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title">Product1</div>
                        <div class="card-text text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, accusamus.</div>
                        <div class="d-flex justify-content-between py-3 align-items-center">
                            <span class="h5 text-primary">1000</span>
                            <span class="text-danger"><s>3000</s></span>
                            <span class="badge  bg-success">20% OFF</span>
                        </div>
                    </div>
                    <div class=" d-flex card-footer bg-white justify-content-center">
                        <button class="btn btn-primary" id="addToCart" data-id=1 data-name="sweater" data-price=5600>Add to cart</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <img src="" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title">Product1</div>
                        <div class="card-text text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, accusamus.</div>
                        <div class="d-flex justify-content-between py-3 align-items-center">
                            <span class="h5 text-primary">1000</span>
                            <span class="text-danger"><s>3000</s></span>
                            <span class="badge  bg-success">20% OFF</span>
                        </div>
                    </div>
                    <div class=" d-flex card-footer bg-white justify-content-center">
                        <button class="btn btn-primary" id="addToCart"  data-id=4 data-name="jean" data-price=200>Add to cart</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <img src="" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title">Product1</div>
                        <div class="card-text text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, accusamus.</div>
                        <div class="d-flex justify-content-between py-3 align-items-center">
                            <span class="h5 text-primary">1000</span>
                            <span class="text-danger"><s>3000</s></span>
                            <span class="badge  bg-success">20% OFF</span>
                        </div>
                    </div>
                    <div class=" d-flex card-footer bg-white justify-content-center">
                        <button class="btn btn-primary" id="addToCart" data-id=5 data-name="shirt" data-price=7500>Add to cart</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <img src="" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title">Product1</div>
                        <div class="card-text text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, accusamus.</div>
                        <div class="d-flex justify-content-between py-3 align-items-center">
                            <span class="h5 text-primary">1000</span>
                            <span class="text-danger"><s>3000</s></span>
                            <span class="badge  bg-success">20% OFF</span>
                        </div>
                    </div>
                    <div class=" d-flex card-footer bg-white justify-content-center">
                        <button class="btn btn-primary" id="addToCart" data-id=2 data-name="pants" data-price=600>Add to cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
  document.addEventListener('DOMContentLoaded',()=>{
    let countElement = document.querySelector('.cart-count');
    countElement.innerHTML = 0;
    let products = JSON.parse(localStorage.getItem('products')) || [];
    // console.log(localStorage);
    let pp = JSON.parse(localStorage.getItem('products'));
    console.log(pp);
  
    document.querySelectorAll("#addToCart").forEach(btn =>{
        btn.addEventListener('click', function(){
            let cartCount = parseInt(countElement.innerHTML);
            countElement.innerHTML = cartCount +1;

            const productId = this.getAttribute('data-id');
            const productName = this.getAttribute('data-name');
            const productPrice = this.getAttribute('data-price');
            // console.log(productPrice);
          

            let product = {
                'productId'  : productId,
                'productName' : productName,
                'productPrice' : productPrice
            }
                
            products.push(product);
            localStorage.setItem('products',JSON.stringify(products));

            console.log(localStorage);
        });
    });
   
  });
</script>
@endsection