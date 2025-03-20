<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',function(){
    return view('admin.dashboard');
})->name('dashboard');
Route::get('/admins', [AdminController::class, 'index'])->name('admins');

Route::resource('admin',AdminController::class);