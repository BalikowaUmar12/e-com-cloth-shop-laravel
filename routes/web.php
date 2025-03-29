<?php
// use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\accountSettings;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::middleware(['authMiddleware'])->group(function(){
    Route::get('/dashboard',function(){ return view('admin.dashboard'); })->name('dashboard');
    Route::get('/admins', [AdminController::class, 'index'])->name('admins');
    Route::resource('admin',AdminController::class);
    Route::get('admin-account', function(){ return view('admin.adminAccount');})->name('adminAccount');

    Route::get('/userProfile', [accountSettings::class,'profile'])->name('userProfile');
    Route::get('accountSecurity', [accountSettings::class,'security'])->name('accountSecurity');
    
});
Route::get('/signUp',function(){ return view('auth.signUp'); })->name('signUp');
Route::get('/',[AuthController::class,'index'])->name('loginForm');
Route::post('/login',[AuthController::class,'login'])->name('loginAction');
Route::post('/signout',[AuthController::class,'logout'])->name('logout');

