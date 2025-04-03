<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        // dd($products);
        return view('admin.product',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'description' => 'required|string',
            'category' =>'required|string'
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            
            $imageName = time().".".$file->getClientOriginalExtension();
            // dd($imageName);
            $file->move(public_path('assets/images/products'), $imageName);

            $validated['image'] = $imageName;
        }
         
        Product::create($validated);
    
        return redirect()->route('product.index')->with('success', 'product added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $validated = $request->validate(
        [
            'name' => 'required|string',
            'image'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'description' => 'required|string',
            'category' =>'required|string'
        ]
      );

      $product = Product::findOrFail($id);
      
      if($request->hasFile('image')){
        $file = $request->file('image');
        $imageName = time().".".$file->getClientOriginalExtension();
        $file->move(public_path('assets/images/products'), $imageName);
        $validated['image'] = $imageName;
      }else{
         $validated['image'] = $product->image;
      }
    //   dd($validated['image']);

     if( $product->update($validated)){
        return back()->with('success','product updated successfully');
     }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
