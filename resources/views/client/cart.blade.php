@extends('layouts.main')
@section('content')
@include('layouts.homeTopBar')
<div class="w-100 h-100 cart-details">
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8  col-sm-12 p-4 bg-white rounded-2">
                <div class="cart-header border-bottom">
                    <h2> <i class="bi bi-cart fs-3" style=""></i> Your Shopping Cart</h2>
                    <p class="text-muted"><span id="no-item"></span> items in your cart</p>
                </div>
                <div class="cartContainer" id="cartContainer"></div>  
            </div> 
            <div class="col-md-4  col-sm-12 pl-4">
                <div class="summary-card bg-white p-3 rounded-2">
                    <h2>Order Summary</h2>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <span id="totalPrice"></span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-1">Total</span>
                        <span id ='totalPrice'>3000</span>
                    </div> 
                    <a class="btn btn-success" href="{{route('checkout')}}">Proced to checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.baseImageUrl = "{{ asset('assets/images/products') }}"; //setting image url to be globally accessed by js using vite
    window.loggedUser = "{{Auth::user()}}"; //accessing logged in user
</script>

@vite(['resources/js/displayingCart.js'])
@endsection
