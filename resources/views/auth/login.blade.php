@extends('layouts.main')

@section('title', 'login')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height:100vh">
    <x-form-component :action="route('loginAction')" method="POST" buttonText="login" formId="loginForm">
        
        <h2 class="text-center">login</h2>
    <div class="my-2">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email">
    </div>
    <div class="mb-3">
        <label for="">Password</label>
        <input type="text" class="form-control" name="password">
    </div>
    <div class="mb-1 d-flex ">
        <p>dont have account, create</p>
        <a href="{{route('signUp')}}" class="mx-2">signUp</a>
    </div>
    </x-form-component>
</div>
@endsection