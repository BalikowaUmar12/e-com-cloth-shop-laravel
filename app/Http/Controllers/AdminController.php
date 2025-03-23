<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $admins = User::where('role','!=','user')
                        ->where('id','!=',Auth::id())    
                        ->get();
        // dd($admins);
        return view('admin.admins',['admins'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('admin.admins');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate(
            [
                'name'=>'required|string',
                'email'=>'required|string|email|unique:users,email',
                'role'=>'required|string',
                'password'=>'confirmed|required|string',
            ]
        );

        // dd($validated);
        User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>Hash::make($validated['password']),
            'role'=>$validated['role']
        ]);
         
        if($validated['role']=='user'){
            return redirect()->route('signUp')->with('success','account created succesfully');
        }else{
            return redirect()->route('admin.index')->with('success','admin added succesfully');
        }
        
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'name'=>'required|string',
                'email'=>'required|email|string',
                'role'=>'required|string'
            ]
        );

        $admin = User::findOrFail($id);
        
        $admin->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
        ]);
        // dd($id);
        return redirect()->route('admin.index')->with('success','admin updated perfectly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::findOrFail($id);

        $admin->delete();
        return redirect()->route('admin.index')->with('success',$admin->name.' '.'deleted');
    }
}
