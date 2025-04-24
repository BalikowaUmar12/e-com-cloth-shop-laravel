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
            @foreach($products as $product)
            <div class="col-md-3 col-sm-6 my-2">
                <div class="card product p-2">
                    <img src="{{asset('assets/images/products/'.$product->image)}}" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title">{{$product->name}}</div>
                        <div class="card-text text-muted">{{$product->description}}</div>
                        <div class="d-flex justify-content-between py-3 align-items-center">
                            <span class="h5 text-primary">UGX {{number_format($product->price,0)}}</span>
                            <span class="text-danger"><s>900</s></span>
                            <span class="badge  bg-success">9</span>
                        </div>
                    </div>
                    <div class=" d-flex card-footer bg-white justify-content-center">
                        <button class="btn btn-primary" id="addToCart" data-id="{{$product->id}}" data-name="{{$product->name}}" data-price="{{$product->price}}" data-description="{{$product->description}}" data-image="{{$product->image}}">Add to cart</button>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
    </div>
</section>
<script>
    window.loggedUser = "{{Auth::user()}}";
</script>
@vite(['resources/js/addingToCart.js'])
@endsection