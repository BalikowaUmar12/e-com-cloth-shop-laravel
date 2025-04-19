<nav class="navbar navbar-expand-lg bg-dark sticky-top">
    <div class="container">
        <a href="#" class="navbar-brand"><h2 class="text-white text-center">Cloth<span class="text-primary">shop</span></h2></a>
        <button class="navbar-toggler bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar nav">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">Home</a>
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
                @if(Auth::user())
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button">account</a>
                        <ul class="dropdown-menu bg-dark" style="">
                            <li>
                                <a href="" class="dropdown-item">orders</a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item">profile</a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item">Kids</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <div class="d-flex align-items-center justify-content-sm-even leftNav" style="gap:1rem">
                <form action="" class="d-flex  w-md-auto">
                    <input type="text" class="form-control">
                    <button class="btn  btn-primary mx-1"><i class="bi bi-search"></i></button>
                </form>
                 <div>
                    <a href="{{route('cart')}}" class="cart-icon position-relative">
                        <i class="bi bi-cart"></i>
                        <span class="cart-count text-white bg-danger text-center">0</span>
                        <!-- <p>cart</p> -->
                    </a>
                 </div>
                @if(Auth::user())
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn text-white"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                @else
                <div class="ms-3">
                   <a href="{{route('loginForm')}}"> <i class="bi bi-person"></i> login</a>
                </div>
                @endif
        </div>
    </div>
</nav>