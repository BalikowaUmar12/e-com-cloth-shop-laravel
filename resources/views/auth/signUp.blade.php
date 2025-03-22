@extends('layouts.main')

@section('title', 'SignUp')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height:100vh">
    <x-form-component :action="route('admin.store')" method="POST" buttonText="signUp" formId="signUpForm">
        <h2 class="text-center">SignUp</h2>
        <input type="hidden" name="role" value="user">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
    
         <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label for="confirm" class="form-label">Repeat password</label>
            <input type="password" class="form-control" name="password_confirmation">
        </div>
        <div class="mb-2 d-flex">
            <p>have account</p>
            <a href="{{route('loginForm')}}" class="mx-2">login</a>
        </div>
    </x-form-component>
</div>
@endsection