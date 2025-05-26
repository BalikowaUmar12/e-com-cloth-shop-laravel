<?php
// use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\api/AuthController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\accountSettings;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\productController;

// use App\Http\Controllers\api\AuthController as ApiAuthController;


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

Route::middleware(['authMiddleware','is_user'])->group(function(){
    Route::get('checkout', function(){ return view('client.checkout');})->name('checkout');
    Route::post('/addToCart',[cartController::class,'addToCart'])->name('addToCart');
    Route::get('/cart/products',[cartController::class,'getProducts']);
    Route::put('/cart/update/{productId}',[cartController::class,'updateProduct']);
    Route::delete('/cart/delete/{productId}',[cartController::class,'deleteProduct']);
    Route::post('/cart/syn/',[cartController::class,'cartSyn']);
});



// Inside web.php
// Route::middleware('api')
//     ->prefix('api')
//     ->group(function () {
//         Route::post('/register', [ApiAuthController::class, 'register']);
//         Route::post('/login', [ApiAuthController::class, 'login']);
//         Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//             return $request->user();
//         });
//     });

