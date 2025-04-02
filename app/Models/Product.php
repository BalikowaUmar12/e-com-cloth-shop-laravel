<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'category',
        'stock',
    ];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
