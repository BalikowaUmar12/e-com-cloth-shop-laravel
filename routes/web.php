<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',function(){
    return view('admin.dashboard');
})->name('dashboard');
Route::get('/admins',function(){
    return view('admin.admins');
})->name('admins');

Route::resource('admin',adminController::class);