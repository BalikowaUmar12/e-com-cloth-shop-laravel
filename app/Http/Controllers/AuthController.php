<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $cred = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        // Check if user exists
        $user = User::where('email', $cred['email'])->first();
        
        if (!$user) {
            return redirect()->route('loginForm')->with('error', 'Account does not exist.');
        }
    
        // Check if password is correct
        if (!Auth::attempt($cred)) {
            return redirect()->route('loginForm')->with('error', 'Incorrect password.');
        }
    
        // Login based on role
        // $u = $user->role;
        // dd($u);
        if($user->role == 'user'){
            return redirect()->intended('/')->with('success', 'Login successful.');  
        }else{
            return redirect()->route('admin.index')->with('success', 'Login successful.');
        }
         
    }

    public function logout(request $request){
        Auth::logout();
        return redirect()->route('home');
    }
}
