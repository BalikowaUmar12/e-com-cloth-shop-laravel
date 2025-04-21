@extends('layouts.main')
@section('content')
@include('layouts.homeTopBar')
<div class="w-100 h-100 cart-details">
 <h1>hello this checkout</h1>
</div>
@vite(['resources/js/displayingCart.js'])
@endsection
