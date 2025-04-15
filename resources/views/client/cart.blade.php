@extends('layouts.main')
@section('content')
@include('layouts.homeTopBar')

<div class="container">
    <div class="row">
      <div class="col-md-8  col-sm-12 p-2">
          <div class="cart-header border-bottom">
              <h2> <i class="bi bi-cart fs-3" style=""></i> Your Shopping Cart</h2>
              <p class="text-muted"><span id="no-item"></span> items in your cart</p>
          </div>
          <div class="cartContainer" id="cartContainer"></div>  
      </div> 
      <div class="col-md-4  col-sm-12 bg-success" style="height:200px"></div>
    </div>
</div>

@vite(['resources/js/displayingCart.js'])
@endsection
