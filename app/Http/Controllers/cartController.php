<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
  public function addToCart(Request $request){
    $product = $request->json()->all();

    // \Log::info('checking'.$product);

    if(Auth::check()){
        $user_id = Auth::id();
        $existing_product = Cart::where('user_id',$user_id)
                                 ->where('product_id',$product['productId'])
                                 ->first();

        if($existing_product){
          $existing_product->quantity += 1;
          $existing_product->save();
        }else{
            Cart::create([
                  'user_id' =>  $user_id,
                  'quantity' =>$product['productQuantity'],
                  'product_id'=>$product['productId'],
                  'price'=>$product['productPrice']
              ]);
        }
            return response()->json([
              'status' => 'success',
              'message' => 'Product received successfully!',
          ]);
    
    }  
}

public function getProducts(){
  $products = Cart::where('user_id', Auth::id())->with('product')->get();
  
  return response()->json($products);
}

public function updateProduct(Request $request, $productId){
      $cartItem = Cart::where('user_id', auth()->id())
                      ->where('product_id', $productId)
                      ->first();

        if ($cartItem) {
          $cartItem->quantity += $request->change;
          // Delete if quantity becomes zero or less
          if ($cartItem->quantity <= 0) {
             $cartItem->delete();
          } else {
             $cartItem->save();
        }
        }

      return response()->json(['message' => 'Cart updated']);
    }

  public function deleteProduct(Request $request, $productId){
        $product = Cart::where('user_id', Auth::id())
                        ->where('product_id', $productId)
                        ->first();
        if($product){
          $product->delete();
        }
    }

  public function cartSyn(Request $request){
     $products = $request->all();
     if($products == 0){
      return response()->json('no item in cart');
     }else{
        foreach($products as $product){
          $exisitingProduct = Cart::where('user_id',Auth::id())
                                    ->where('product_id', $product['productId'])
                                    ->first();
          if($exisitingProduct){
            $exisitingProduct->quantity += $product['productQuantity'];
            $exisitingProduct->save();
          }else{
              Cart::create([
                'user_id' =>  Auth::id(),
                'quantity' =>$product['productQuantity'],
                'product_id'=>$product['productId'],
                'price'=>$product['productPrice']
            ]);
          }
          
        }

      return response()->json(' cart sycronoised successfully');
     }
      
  }
}
