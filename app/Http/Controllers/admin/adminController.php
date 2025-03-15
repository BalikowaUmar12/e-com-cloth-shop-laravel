<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validated = $request->validate(
            [
                'name'=>'required|string',
                'email'=>'required|string|email|unique:users,email',
                'password'=>'confirmed|required|string',
                'role'=>'required|string'
            ]
        );

        User::create([
            'name'=>$validate['name'],
            'email'=>$validate['email'],
            'password'=>Hash::make($validate['password']),
            'role'=>$validate['role']
        ]);

        return view('')->with('success','admin added succesfully');
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
