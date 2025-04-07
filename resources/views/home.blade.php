@extends('layouts.main')
@section('content')

<nav class="navbar navbar-expand-lg bg-dark sticky-top">
    <div class="container">
        <a href="#" class="navbar-brand"><h2 class="text-white text-center">Cloth<span class="text-primary">shop</span></h2></a>
        <button class="navbar-toggler bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar nav">
                <li class="nav-item">
                    <a href="" class="nav-link">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button">Categories</a>
                    <ul class="dropdown-menu bg-dark" style="">
                        <li>
                            <a href="" class="dropdown-item">Men</a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">Women</a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">Kids</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center justify-content-sm-even leftNav" style="gap:1rem">
                <form action="" class="d-flex  w-md-auto">
                    <input type="text" class="form-control">
                    <button class="btn  btn-primary mx-1"><i class="bi bi-search"></i></button>
                </form>
                 <div>
                    <a href="" class="cart-icon position-relative">
                        <i class="bi bi-cart"></i>
                        <span class="cart-count text-white bg-danger text-center">3</span>
                        <!-- <p>cart</p> -->
                    </a>
                 </div>
                <div class="ms-3">
                   <a href="{{route('loginForm')}}"> <i class="bi bi-person"></i> login</a>
                </div>
        </div>
    </div>
</nav>

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
                        <button class="btn btn-primary">Add to cart</button>
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
                        <button class="btn btn-primary">Add to cart</button>
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
                        <button class="btn btn-primary">Add to cart</button>
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
                        <button class="btn btn-primary">Add to cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection