<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class accountSettings extends Controller
{
    public function profile(){
        return view('account.profile');
    }
    public function security(){
        return view('account.security');
    }

    public function updateUserAccount(Request $request){
        $data = $request->validate(
            [
                'name'=>'nullable|string',
                'email'=>'nullable|string|email',
                'oldPassword'=>'nullable|string',
                'password'=>'nullable|string|confirmed',
            
            ]
          );
           
          $user = Auth::user();

          if(!empty($data['name'])){
            $user->name = $data['name'];
          }

          if(!empty($data['email'])){
            $user->email = $data['email'];
          }
          if(!empty($data['oldPassword']) && !empty($data['password'])){
                if(!Hash::check($data['oldPassword'], $user->password)){
                    return back()->with('error', 'wrong current password');
                }else{
                    $user->password = Hash::make($data['password']);
                }   
            }
          $user->save();

        return redirect()->route('adminAccount')->with('success', 'updated succesfully');
    }

    public function profilePic(Request $request){
        // dd($request->all());
        $user = Auth::user();
        $request->validate(
            [
                'photo'=>'image|required|mimes:jpeg,png,jpg,gif|max:2048'
            ]
        );
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $photoName = time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/profile'), $photoName);

            $user->photo = $photoName;

            if($user->save()){
                return redirect()->route('adminAccount')->with('success', 'updated succesfully');
            }
            // Auth::user()->update(['photo'=>$photoName]);
        }
       
    }
}
