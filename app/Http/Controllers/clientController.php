<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class clientController extends Controller
{
    public function index(){

        return view('auth.signUp');
    }

    public function store(Request $request){
        $validated = $request->validate(
            [
                'name'=>'required|string',
                'email'=>'required|string|email|unique:users,email',
                'password'=>'confirmed|required|string',
            ]
        );
        // dd($validated);
        User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>Hash::make($validated['password']),
            'role'=>'user'
        ]);

        return redirect()->route('loginForm')->with('please login in');
    }
}
