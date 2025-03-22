<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',function(){
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/signUp',function(){ return view('auth.signUp'); })->name('signUp');
Route::get('/sign',[AuthController::class,'index'])->name('loginForm');
Route::post('/login',[AuthController::class,'login'])->name('loginAction');

Route::get('/admins', [AdminController::class, 'index'])->name('admins');

Route::resource('admin',AdminController::class);