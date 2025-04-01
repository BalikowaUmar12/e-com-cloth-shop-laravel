<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillabe = [
       'name' 
    ];

    // public function product()
    // {
    //     return $this->hasMany(Product::class);
    // }
}
