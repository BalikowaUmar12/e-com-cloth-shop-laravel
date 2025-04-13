@extends('layouts.main')
@section('content')
@include('layouts.homeTopBar')

<div class="container">
    <div class="row">
      <div class="col-md-8  col-sm-12 p-2">
          <div class="cart-header border-bottom">
              <h2> <i class="bi bi-cart fs-3" style=""></i> Your Shopping Cart</h2>
              <p class="text-muted">3 items in your cart</p>
          </div>
          <div class="cartContainer" id="cartContainer">
              
          </div>  
      </div> 
      <div class="col-md-4  col-sm-12 bg-success" style="height:200px">kh;ljjolj</div>
    </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    let cart = JSON.parse(localStorage.getItem('products')) || []
    let html = '';
    // let a = "lee";
    console.log(cart);
    if(cart.length === 0){ 
        html += `<p>No item in the cart</p>`;
    } else {
        cart.forEach(product => {
          // console.log(cart.productName);
          // console.log(cart.name);
            html += `<div class="cart-item row align-items-center border-bottom py-2">
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
                                <button class="btn btn-outline-secondary">+</button>
                                <input type="text" class="form-control mx-2 text-center">
                                <button class="btn btn-outline-secondary">-</button>
                            </div>
                            <button class="btn btn-outline-primary btn-sm">Remove</button>
                        </div>
                    </div>`;
        });

        document.getElementById('cartContainer').innerHTML = html;
    }
});

</script>
@endsection