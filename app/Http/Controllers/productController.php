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
        return view('admin.product');
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
            $file->move(public_path('assets/images/product'), $imageName);

            $validated['image'] = $imageName;
        }
        
        // $imageName = time().'_'.$request->file('image')->getClientOriginalName();
        // $imagePath = $request->file('image')->storeAs('uploads', $imageName, 'public');
         
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
