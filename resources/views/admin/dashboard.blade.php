@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<!-- Remove padding and margin from container-fluid and row -->
<div class="container-fluid p-0 m-0">
  <div class="row g-0 w-100"> <!-- Use g-0 to remove gutters (spacing between columns) -->
    <!-- Sidebar -->
    <div class="bg-dark d-none d-md-block col-md-3 col-lg-2 p-2 sticky-top">
      <h2 class="text-white text-center my-2">Cloth<span class="text-primary">shop</span></h2>
      <ul class="nav sidenav flex-column my-5">
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="bi bi-house-door me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('category.index')}}" class="nav-link">
                <i class="bi bi-tags me-2"></i> Category
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="bi bi-box-seam me-2"></i> Products
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link d-flex justify-content-between">
                <div><i class="bi bi-cart me-2"></i> Orders</div>
                <span class="badge bg-primary">8</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="bi bi-credit-card me-2"></i> Payments
            </a>
        </li>
        <li class="nav-item dropdown">
            <button class="btn dropdown-toggle w-100 text-start d-flex align-items-center justify-content-between" data-bs-toggle="dropdown" aria-expanded="false">
                <div><i class="bi bi-gear me-2"></i>Settings</div>
            </button>
            <ul class="dropdown-menu bg-dark w-100">
                <li>
                    <a href="{{ route('admins') }}" class="dropdown-item">
                        <i class="bi bi-person-gear me-2"></i> Admins
                    </a>
                </li>
                <li>
                    <a href="{{route('adminAccount')}}" class="dropdown-item">
                        <i class="bi bi-person-circle me-2"></i> Account
                    </a>
                </li> 
            </ul>
        </li>
      </ul>
    <div class="position-absolute bottom-0 p-5">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
     
    </div>

    <!-- alert messages -->

    <!-- Main Content Area -->
    <div class="col-md-9 col-lg-10 admin-main-content d-flex flex-column bg-light" style="">
        <div class="bg-white w-100 p-3">hl</div>
        <div class="flex flex-col w-100 p-3">
            @yield('admin-main-content')
        </div>
    </div>
  </div>
</div>
@endsection