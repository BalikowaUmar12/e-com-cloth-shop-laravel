<?php
// use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\accountSettings;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\productController;


// public routes
Route::get('/', [productController::class,'home'])->name('home');
Route::get('cart', function() {return view('client.cart');})->name('cart');
Route::get('/signUp', [clientController::class,'index'])->name('signUp');
Route::post('/accountCreate', [clientController::class,'store'])->name('createClientAccount');
Route::get('/signIn',[AuthController::class,'index'])->name('loginForm');
Route::post('/login',[AuthController::class,'login'])->name('loginAction');
Route::post('/signout',[AuthController::class,'logout'])->name('logout');

// only admin routes 
Route::middleware(['authMiddleware', 'is_admin'])->group(function(){
    Route::get('/dashboard',function(){ return view('admin.dashboard'); })->name('dashboard');
    Route::get('/admins', [AdminController::class, 'index'])->name('admins');
    Route::resource('admin',AdminController::class);
    Route::get('admin-account', function(){ return view('admin.adminAccount');})->name('adminAccount');

    Route::put('/userProfileupdate', [accountSettings::class,'updateUserAccount'])->name('updateUserAccount');
    Route::put('/userProfilePic', [accountSettings::class,'profilePic'])->name('updateUserPic');
    Route::get('/userProfile', [accountSettings::class,'profile']);
    Route::get('/accountSecurity', [accountSettings::class,'security']);

    Route::resource('product',productController::class);
    
});



