<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class accountSettings extends Controller
{
    public function profile(){
        return view('account.profile');
    }
    public function security(){
        return view('account.security');
    }
}
